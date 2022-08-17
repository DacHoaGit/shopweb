<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }
    public function changeName(Request $request){
        $request->validate([
            'name' => 'required|max:50',
        ]);
        try {
            DB::beginTransaction();
            $name = $request->input('name');
            $id = auth()->user()->id;
            $user = User::find($id);
            $user->name = $name;
            $user->save();
            DB::commit();
            Session::flash('success', 'Change Name Success !');
            return redirect('profile');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('error', 'Change Name Error !');
            return redirect('profile');
        }
        
        // dd($request->input('name'));
    }
    public function changePassWord(Request $request){

        // dd($request->input());
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        // dd(1);
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("success", "Password changed successfully!");
    }
}
