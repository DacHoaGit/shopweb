<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\slider;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function index(){
        return view('main',[
            'sliders'=>Slider::where('active', 0)->get(),
            'menus'=>Menu::select('id','name')->get(),
        ]);
    }
}
