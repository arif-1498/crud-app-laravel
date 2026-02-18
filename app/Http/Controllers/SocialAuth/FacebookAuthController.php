<?php

namespace App\Http\Controllers\SocialAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{

public function redirect(){
    return Socialite::driver('facebook')->redirect();
}

public function callback(){
    $fuser=Socialite::driver('facebook')->user();
    dd($fuser);
}
    
}
