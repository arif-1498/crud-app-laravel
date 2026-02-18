<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;

class SocialAuthController extends Controller
{

   public function redirect($social)
   {
      return Socialite::driver($social)->redirect();
   }
   public function callback(Request $request, $social)
   {
      $socialUser = Socialite::driver($social)->user();
      $suser = User::firstOrCreate(
         ['social_id' => $socialUser->getId()],
         [
            'social_platform' => 'Google',
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'password' => Hash::make('password'),
         ]
      );

         Auth::login($suser);
         $request->session()->regenerate();
         return redirect()->intended(RouteServiceProvider::HOME);
      }



   }

