<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $menus =  Menu::query()->with('childrenMenus')->where('active',0)->orderByDesc('id')->get();
        dd($menus);

    }
}
