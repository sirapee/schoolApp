<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Adldap\Laravel\Facades\Adldap;
use App\User;
use Illuminate\Support\Facades\Log;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Artisaninweb\SoapWrapper\SoapWrapper;
use App\soap\nusoap_client;



class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use AuthenticatesUsers;

    public function username()
    {
        return 'username';
    }




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->soapWrapper = $soapWrapper;
    }
    public function index()
    {
        return view('ldap.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function lockScreen()
    {
        return view('ldap.lockscreen');
    }

    public function unlock(Request $request)
    {


        $password = $request->password;
        $this->validate($request, [
            'password' => 'required',
        ]);
        $loginUsername = strtolower($request->username);
        if($loginUsername == 'admin' || $loginUsername == 'administrator' || $loginUsername == 'admin2'){
            //dd('Me');
            if(\Hash::check($password, Sentinel::getUser()->password)){

                return redirect()->intended('/dashboard');
            }
            return back()->withErrors('Password does not match. Please try again.');
        }else{
            if (Adldap::auth()->attempt($request->username, $request->password)) {
                return redirect()->intended('/dashboard');
            }
            return back()->withErrors('Password does not match. Please try again.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function postLogin(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' =>  'required'
        ]);
        //dd($request->all());
        $loginUsername = strtolower($request->username);
        if($loginUsername == 'admin' || $loginUsername == 'administrator' || $loginUsername == 'admin2'){
            return $this->adminLogin($request);
        }else{
            return $this->ADlogin($request);
        }


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adldap::auth()->logout();
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/userLogin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function ADlogin(Request $request)
    {
        $check = strpos($request->username, '@us.com');
        if ($check !== false) {
            $username = str_replace('@us.com', '', $request->username);
            $request->merge(['username' => $username]);
        }
        $username = $request->input('username');
        $password = $request->input('password');

        try {
            if (Adldap::auth()->attempt($username, $password)) {
                $search = Adldap::search()->where('samaccountname', '=', $username)->firstOrFail();
                $employeeid = $search->employeeid[0];
                if ($user = User::byEmpId(trim($employeeid))) {
                    if($user->two_factor === 'B'){
                        return view('ldap.two-factor',compact('user'));
                    }
                    if ( $user->verified_by == '' || $user->verified_by == null)
                    {
                        $userCheck = User::paginate(5);
                        return redirect()
                            ->back()
                            ->with([
                                'fail' => 'Verification Pending!!!',
                                'users' => $userCheck
                            ]);
                    }
                    //if (Sentinel::authenticate($request->all())) {
                    $sentinelUser = Sentinel::findById($user->id);
                    return $this->redirectAfterLogin($sentinelUser,$request);
                }else{
                    Log::info('username not found '. $username);
                    return redirect()->back()->with(['fail' => 'username not found']);
                }
            }else{
                Log::info('Invalid credentials '. $username);
                return redirect()->back()->with(['fail' => 'Invalid credentials']);
            }

        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            Log::info('You have entered invalid credentials numerous times, you account has been suspended for '. $delay . ' for '. $username);
            redirect()
                ->back()
                ->with([
                    'fail' => "You have entered invalid credentials numerous times, you account has been suspended for $delay"
                ]);
        } catch (NotActivatedException $e) {
            $message = $e->getMessage();
            Log::info($message);
            return redirect()->back()->with(['fail' => $message]);
        }catch (\Exception $e){
            $message = $e->getMessage();
            Log::info($message);
            return redirect()->back()->with(['fail' => 'Login Failed']);
        }
    }

    private function adminLogin(Request $request)
    {
        try {
            //if (Sentinel::authenticate($request->all())) {
            if ($user= Sentinel::authenticate([
                'username'    => $request->username,
                'password' => $request->password
                ])
            ) {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                if($slug == 'admin' || $slug == 'admin2' ){
                    return redirect()->intended('/dashboard');
                }else{
                    return redirect()->back()->withErrors('Invalid role');
                }
            }else{
                return redirect()
                    ->back()
                    ->with([
                        'fail' => 'Login Failed, please confirm Credentials'
                    ]);
            }
        } catch (ThrottlingException $e){
            $delay = $e->getDelay();
            return redirect()
                ->back()
                ->with([
                    'fail' => "You have entered invalid credentials numerous times, you account has been suspended for $delay"
                ]);
        } catch (NotActivatedException $e){
            $message = $e->getMessage();
            return redirect()->back()->with(['fail' => $message]);
        }
        catch (\Exception $e){
            $message = $e->getMessage();
            Log::info($message);
            return redirect()->back()->with(['fail' => 'Login Failed']);
        }
    }

    public function twoFactor(){
        return view('ldap.two-factor');
    }

    public function postTwoFactor (Request $request){

        try {
            $this->validateToken('IU1311003','staff','0019882900ww','7tnGtLgEeEIMVOt4DjlQk3od035ZCWmtLnqcywJKm+1=2');
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
            dd('token validation failed');
        }


        if ($user = User::byEmpId($request->emp_id)) {
            if ($user->verified_by == '' || $user->verified_by == null) {
                $userCheck = User::paginate(5);
                return redirect('userLogin')
                    ->with([
                        'fail' => 'Verification Pending!!!',
                        'users' => $userCheck
                    ]);
            }
            $sentinelUser = Sentinel::findById($user->id);
            return $this->redirectAfterLogin($sentinelUser,$request);
        }
    }



    /**
     * @param $sentinelUser
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    private function redirectAfterLogin($sentinelUser,$request)
    {
        if (Sentinel::login($sentinelUser)) {
            $slug = Sentinel::getUser()->roles()->first()->slug;
            if ($slug == 'support' || $slug == 'audit' ||$slug == 'sac' || $slug == 'settlement_inputter' || $slug == 'settlement_authorizer') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->back()->withErrors('Invalid role');
            }
        }else {
            return redirect()
                ->back()
                ->with([
                    'fail' => 'Login Failed',
                    'request' => $request->all()
                ]);
        }
    }

    private function validateToken($userId,$tokenGroup,$tokenPin,$authCode){
        $client = new nusoap_client('http://10.0.33.62/Test_EntrustBridge/API.svc?singleWsdl', 'wsdl');
        $client->soap_defencoding='utf-8';
        $err = $client->getError();
        if ($err) {
            Log::info($err);
            dd($err);
        }

        $param = array('userId'=>$userId,'tokenGroup'=>$tokenGroup,'tokenPin'=>$tokenPin ,'authCode'=>$authCode);
        $result = $client->call('tokenROAuthenticate', array('parameters' => $param), '', '', false, true);
        // Check for a fault
        if ($client->fault) {
            Log::info($result);
            dd($result);
            return false;
        } else {
            // Check for errors
            $err = $client->getError();
            if ($err) {
                Log::info($err);
                dd($err);
                return false;
            } else {
                Log::info($result);
                dd($result['tokenROAuthenticateResult']);
            }
        }
    }


}
