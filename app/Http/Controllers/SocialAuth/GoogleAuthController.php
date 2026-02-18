<?php

namespace App\Http\Controllers\SocialAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;

class GoogleAuthController extends Controller
{
    public function redirect(){
       return Socialite::driver('google')->redirect();
       
 }
 public function callback(Request $request){
    $googleUser = Socialite::driver('google')->user();
    $user=User::where('social_id',$googleUser->getId())->first();
    
    if(!$user){

     
      User::create([
         'social_id'=>$googleUser->getId(),
         'social_platform'=>'Google',
         'name'=>$googleUser->getName(),
         'email'=>$googleUser->getEmail(),
         'password'=>Hash::make('password'),
      ]);
      

    }
    else{
      
      Auth::login($user);
      $request->session()->regenerate();
       return redirect()->intended(RouteServiceProvider::HOME);

    }
   
    
 
 }

}
