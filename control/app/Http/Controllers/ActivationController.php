<?php

namespace App\Http\Controllers;

use Sentinel;
use Activation;
use Illuminate\Http\Request;
use App\User;

class ActivationController extends Controller
{
    public function activate($email,$activationCode){
        $user = User::whereEmail($email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        if (Activation::complete($sentinelUser, $activationCode)){
            return redirect('/userLogin')->with(['success' => 'Your account has been activated, you can login below']);
        }else{

        }
    }


}
