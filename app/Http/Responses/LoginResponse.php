<?php

namespace App\Http\Responses;
use Closure;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        // dd($request);
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade

        if(Auth::user()->role === UserRole::ADMIN){
            return redirect('admin');
        }
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(config('fortify.home'));
    
    }

}