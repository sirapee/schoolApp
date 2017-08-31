<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Sentinel;
use App\Mail\PasswordReset;


class PasswordResetController extends Controller
{
    public function passwordReset (){
        return view('ldap.passwords.email');
    }

    public function passwordResetPost (Request $request){
        return $this->resetEmail($request);
    }

    public function reset($email, $resetToken){
        return $this->showReset($email, $resetToken);

    }

    public function postReset(Request $request){
        return $this->submitReset($request);
    }

    protected function sendResetMail($user, $url){
        $reset = new  PasswordReset($user,$url);
        Mail::to($user->email)->send($reset);

        // Mail::to($event->user->email)->send(new NewUserWelcome($event->user));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitReset(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);
        if ($user = User::byEmail($request->email)) {
            $sentinelUser = Sentinel::findById($user->id);
            if (!$reset = Reminder::exists($sentinelUser)) {
                return redirect()
                        ->route('login')
                        ->with([
                            'fail' => 'Process Failed'
                        ]);
            }
            if ($reset->code != $request->token) {
                return redirect()
                        ->route('login')
                        ->with([
                            'fail' => 'Process Failed'
                        ]);
            }
            Reminder::complete($sentinelUser, $request->token, $request->password);
            return redirect('/userLogin')
                    ->with([
                        'success' => 'Reset successful, you can Login below']
                    );
        } else {
            return redirect()
                    ->route('login')
                    ->with(['fail' => 'Process Failed']);
        }
    }

    /**
     * @param $email
     * @param $resetToken
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function showReset($email, $resetToken)
    {
        if ($user = User::byEmail($email)) {
            $sentinelUser = Sentinel::findById($user->id);
            if (!$reset = Reminder::exists($sentinelUser)) {
                return redirect()
                        ->route('login')
                        ->with([
                            'fail' => 'Process Failed'
                        ]);
            }
            if ($reset->code != $resetToken) {
                return redirect()
                        ->route('login')
                        ->with([
                            'fail' => 'Process Failed'
                        ]);
            }
            return view('ldap.passwords.reset')
                    ->with(
                        compact('email', 'resetToken')
                    );
        } else {
            return redirect()
                ->route('login')
                ->with([
                    'fail' => 'Process Failed'
                ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetEmail(Request $request)
    {
        $user = User::whereEmail($request->email)
                                        ->first();

        if (count($user) == 0) {
            return redirect()
                    ->back()
                    ->with([
                        'success' => 'Reset link has been sent to you Email Address'
                    ]);
        }
        //get or create reset code
        $sentinelUser = Sentinel::findById($user->id);
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
        $url = 'http://localhost/laravel-gentelella/public/resetPassword/' . $sentinelUser->email . '/' . $reminder->code;
        $this->sendResetMail($sentinelUser, $url);
        return redirect()
                ->back()
                ->with([
                    'success' => 'Reset link has been sent to you Email Address'
                ]);
    }
}
