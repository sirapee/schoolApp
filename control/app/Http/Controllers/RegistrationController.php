<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\Log;
use Sentinel;
use Activation;
use App\User;
use App\Mail\Activate;
use Mail;
use DB;
use Adldap\Models\ModelNotFoundException;
use App\Upload;


class RegistrationController extends Controller
{

//    public function index(){
//        $roles = Sentinel::getRoleRepository()->get();
//        return view('sac.profileUser')->with(['roles' => $roles]);
//    }



    public function index()
    {
        $users = User::paginate(5);
        return view('users-mgmt/index', ['users' => $users]);
    }

    public function create()
    {

        $roles = Sentinel::getRoleRepository()->get();
        return view('users-mgmt.create')
            ->with([
                'roles' => $roles
            ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'first_name' => 'required',
            'emp_id' => 'required',
            'role' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'username' => 'required',
            'job_title' => 'required',
            'email' => 'required',
        ]);

        try {
            $roleFromUrl = $request->role;
            if (!$search = Adldap::search()->where('employeeid', '=', $request->emp_id)->firstOrFail()) {
                //dd($search->displayname[0]);
                return redirect()
                            ->back()
                            ->with([
                                'fail' => 'Invalid Employee Id'
                            ]);
            }
            $request->merge(['deleted' => 'N']);
            $request->merge(['password' => 'default']);
            $request->merge(['created_by' => Sentinel::getUser()->username]);

            if ($search->thumbnailphoto[0] == null){
                $request->merge(['profilePix' => 'avatar.png']);
            }else{
                $request->merge(['profilePix' => $request->emp_id.'.png']);
            }
            //dd($request->all());
            if ($user = User::byUsername(trim($request->username))) {
                return redirect()
                            ->back()
                            ->with([
                                'fail' => 'User Already Exists'
                            ]);
            }
            if (!$user = Sentinel::register($request->all())) {
                return redirect()
                            ->back()
                            ->with([
                                'fail' => 'User Profile failed'
                            ]);
            }

            $role = Sentinel::findRoleBySlug($roleFromUrl);

            $role->users()->attach($user);

            if ($search->thumbnailphoto[0] != null){
                $this->saveProfileImage($search->thumbnailphoto[0],$request->emp_id);
            }


            $this->saveProfilePix($request, $user);


            //Attach permissions
            if ($request->has('permissions')){
                foreach ($request->permissions as $permission){
                    $user->addPermission($permission,true);
                    $user->save();
                }
            }

            $users = User::paginate(5);
            return redirect()
                        ->route('user-management.index')
                        ->with([
                            'success' => 'User Created Successfully',
                            'users' => $users
                        ]);
        } catch (ModelNotFoundException $e) {
            $message = 'User Id ' . $request->emp_id . ' Not Found';
            $message = $e->getMessage();
            Log::info($message);
            return redirect()
                        ->back()
                        ->with([
                            'fail' => $message
                        ]);
        }catch (\Exception $e){
            $message = $e->getMessage();
            Log::info($message);
            return redirect()
                ->back()
                ->with([
                    'fail' => 'User creation failed'
                ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function details($id)
    {
        try {
            if ($search = Adldap::search()->where('employeeid', '=', $id)->firstOrFail()) {
                $names = explode(' ', $search->displayname[0]);
                if ($names[1] == '') {
                    $names[1] = $names[2];
                }
                $response = [
                    'status' => 'success',
                    'department' => $search->department[0],
                    'username' => strtolower($search->samaccountname[0]),
                    'email' => strtolower($search->mail[0]),
                    'first_name' => $names[0],
                    'last_name' => $names[1],
                    'job_title' => $search->title[0]
                ];

                return response()
                            ->json([
                                'response' => $response
                            ]);
            }
            $response = [
                'status' => 'failure',
            ];

            return response()
                        ->json([
                            'response' => $response
                        ]);
        } catch (ModelNotFoundException $e) {
            $response = [
                'status' => 'failure',
                'empId' => $id,
                'message' => 'User Id ' . $id . ' Not Found'
            ];
            return response()
                        ->json([
                            'response' => $response
                        ]);
        }

    }

    public function edit($id)
    {
        try{
            $user = User::find($id);
            // Redirect to user list if updating user wasn't existed
            if ($user == null || count($user) == 0) {
                return redirect()
                    ->intended('/user-management');
            }
            if ( $user->verified_by == '' || $user->verified_by == null)
            {
                $users = User::paginate(5);
                return redirect()
                    ->back()
                    ->withErrors(' Verification Pending for ' . $user->first_name .' !!!');
            }
            $sentinelUser = Sentinel::findById($id);
            //dd(array_keys($sentinelUser->permissions));
            $userRole =  $sentinelUser->roles()->first();
            $permissions = DB::table('permissions')->where('slug',$userRole->slug)->orderBy('name', 'asc')->get();
            $roles = Sentinel::getRoleRepository()->get();
            return view('users-mgmt/edit', ['user' => $user, 'roles'=>$roles, 'userRole' => $userRole, 'permissions' => $permissions, 'sentinelUser' => $sentinelUser]);
        }catch (\Exception $e){
            $message = $e->getMessage();
            return redirect()
                ->back()
                ->with([
                    'fail' => $message
                ]);
        }
    }

    public function permissionsDetails($slug)
    {
        try{
            $permissions = DB::table('permissions')->where('slug',$slug)->orderBy('name', 'asc')->get();

            $response = [
                'status' => 'success',
                'permissions' => $permissions,
            ];

            return response()
                ->json([
                    'response' => $response
                ]);
        }catch (\Exception $e){
            return response()
                ->json([
                    'response' => 'fail'
                ]);
        }
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        try{
            $user = User::findOrFail($id);
            $sentinelUser = Sentinel::findById($id);
            if ( $user->verified_by == '' || $user->verified_by == null)
            {

                return redirect()
                    ->back()
                    ->withErrors('Verification Pending for ' . $user->first_name .' !!!');
            }

            $constraints = [
                'emp_id' => 'required|max:20',
                'first_name' => 'required|max:60',
                'last_name' => 'required|max:60'
            ];
            $now = $this->nowdate();
            $input = [
                'emp_id' => $request['username'],
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'verified_by' => null,
                'modified_by' => Sentinel::getUser()->username,
                'modified_date' => $now,
            ];
            $roleFromUrl = $request->role;

            $this->validate($request, $constraints);
            User::where('id', $id)
                ->update($input);
            $role = Sentinel::findRoleBySlug($roleFromUrl);
            $userRoles =  $sentinelUser->roles()->get();
            //$userRole->users()->detach($sentinelUser);

            foreach ($userRoles as $userRole){
                $userRole->users()->detach($sentinelUser);
            }
            $role->users()->attach($sentinelUser);
            //Attach permissions
            if ($request->has('permissions')){
                foreach ($request->permissions as $permission){
                    $sentinelUser->addPermission($permission,true);
                    $sentinelUser->save();
                }
            }

            $users = User::paginate(5);
            return redirect()
                ->route('user-management.index')
                ->with([
                    'success' => 'User Updated Successfully',
                    'users' => $users
                ]);
        }catch (\Exception $e){
            $message = $e->getMessage();
            return redirect()
                ->back()
                ->withErrors( $message);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::find($id);
            if ( $user->verified_by == '' || $user->verified_by == null)
            {
                $users = User::paginate(5);
                return redirect()
                    ->back()
                    ->with([
                        'fail' => 'Verification Pending for ' . $user->first_name .' !!!',
                        'users' => $users
                    ]);
            }
            User::where('id', $id)->delete();
            $now = $this->nowdate();
            $input = [
                'verified_by' => null,
                'modified_by' => Sentinel::getUser()->username,
                'modified_date' => $now,
            ];

            User::where('id', $id)
                ->update($input);
            $users = User::paginate(5);
            return redirect()
                ->route('user-management.index')
                ->with([
                    'success' => 'User Deleted Successfully',
                    'users' => $users
                ]);
        }catch (\Exception $e){
            $message = $e->getMessage();
            return redirect()
                ->back()
                ->with([
                    'fail' => $message
                ]);
        }

    }

    public function deleted()
    {
        $users = User::onlyTrashed()->paginate(5);
        return view('users-mgmt/deleted', ['users' => $users]);
    }

    public function restore($id)
    {
        User::onlyTrashed()
            ->where('id', $id)
            ->restore();
        $users = User::paginate(5);
        return redirect()
            ->route('user-management.index')
            ->with([
                'success' => 'User Restored Successfully',
                'users' => $users
            ]);
    }


    public function verify($id)
    {
        try{

            DB::table('users')
                ->where('id', $id)
                ->where('modified_by','<>', Sentinel::getUser()->username)
                ->update(['verified_by' => Sentinel::getUser()->username]);
            $sentinelUser = Sentinel::findById($id);
            if ( Activation::completed($sentinelUser))
            {
                $users = User::paginate(5);
                return redirect()
                    ->route('user-management.index')
                    ->with([
                        'success' => 'Record Verified Successfully',
                        'users' => $users
                    ]);
            }

            $activation = Activation::create($sentinelUser);
            $this->sendMail($sentinelUser, $activation->code);
            $users = User::paginate(5);
            return redirect()
                ->route('user-management.index')
                ->with([
                    'success' => 'User Verified Successfully',
                    'users' => $users
                ]);
        }catch (\Exception $e){
            $message = $e->getMessage();
            return redirect()
                ->back()
                ->with([
                    'fail' => $message
                ]);
        }

    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $constraints = [
            'username' => $request['username'],
            'first_name' => $request['firstname'],
            'last_name' => $request['lastname'],
            'emp_id' => $request['emp_id']
        ];

        $users = $this->doSearchingQuery($constraints);
        return view('users-mgmt/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = User::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%' . $constraint . '%');
            }

            $index++;
        }
        return $query->paginate(5);
    }

    protected function sendMail($user, $code)
    {
        $activate = new  Activate($user, $code);
        Mail::to($user->email)->send($activate);


        // Mail::to($event->user->email)->send(new NewUserWelcome($event->user));
    }

    private function saveProfileImage($image,$staffId){
        $data = $image; // replace with an image string in bytes
        $file = imagecreatefromstring($data); // php function to create image from string
        $filename = 'uploads/'.$staffId;

        if ($file !== false)
        {
            // saves an image to specific location
            $resp = imagepng($file, $filename.'.png');
            // frees image from memory
            imagedestroy($file);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param Request $request
     * @param $user
     */
    private function saveProfilePix(Request $request, $user)
    {
        $extension = 'png';
        $upload = new Upload();
        $upload->mime = 'img';
        $upload->original_filename = '';
        $upload->filename = $request->emp_id . '.' . $extension;
        $user->uploads()->save($upload);
    }

    /**
     * @return false|string
     */
    private function nowdate()
    {
        $format = 'Y/m/d H:i:s';
        $now = date($format);
        return $now;
    }


}
