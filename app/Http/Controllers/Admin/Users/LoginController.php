<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\c;
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
    public function loginWithGoogle(){
        return Socialite::driver('facebook')->redirect();
    }
    public function callBackFromGoogle(){
        try {
            $user = Socialite::driver('facebook')->user();
            
        } catch (\Throwable $th) {

        }
    }

}
