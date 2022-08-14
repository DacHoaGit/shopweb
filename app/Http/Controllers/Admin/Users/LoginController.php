<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin.Users.login',[
            'title' => 'Login System',
        ]);
    }

    /**
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password'=>$request->input('password'),
            // 'level'=>1
        ],$request->input('remember'))){
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email or password wrong');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
