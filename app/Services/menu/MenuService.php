<?php

namespace App\Http\Services\menu;

use App\Models\Menu;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function create($request){
        try {
            Menu::create([
                'name'=>(string) $request->input('name'),
                'parent-id'=>(int) $request->input('parent-id'),
                'description'=>(string) $request->input('description'),
                'content'=>(string) $request->input('content'),
                'active'=>(string) $request->input('active'),
            ]);
            $request->session()->flash('success','Create success');
        } catch (\Throwable $err) {
            $request->session()->flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

}
