<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RecaptchaController extends Controller
{
    public function handleCaptcha(Request $req){
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $secret = '6LfwUu8oAAAAABS9bosOfAxrYZOD9pB0lTAWxu8G';
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $req->input('g-recaptcha-response');
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response.'&remoteip='.$ip; 
        $fire = file_get_contents($url);
        $fireArray = json_decode($fire, true);
        if($fireArray['success']){
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();
            return "Your recaptcha was successful with user submission.";
        }else{
            return "Your recaptcha failed!";
        }
    }
}
