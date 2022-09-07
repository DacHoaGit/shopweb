<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\c;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    

    public function logout()
    {
        Auth::logout();
        Session::forget('carts');
        return redirect('login');
    }
    // public function redirectToProvider($driver)
    // {
    //     return App\Http\Controllers\Admin\Users\Socialite::driver($driver)->redirect();
    // }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(){
        // try {
            
            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            }
            else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                
                Auth::login($newUser);
      
                return redirect('/');
            }
      
        // } 
        // catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
