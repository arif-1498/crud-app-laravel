<?php

namespace App\Http\Controllers\SocialAuth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LinkedInAuthController extends Controller
{
    
    public function redirect()
    {
        return Socialite::driver('linkedin-openid')->redirect();
    }

    
    public function callback()
    { 
        try {
            $luser = Socialite::driver('linkedin-openid')->user(); 
            dd($luser); 
        } catch (\Exception $e) {
            dd("LinkedIn login failed: " . $e->getMessage());
        }
    }
}
