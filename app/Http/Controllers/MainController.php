<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\slider;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function index(){
        return view('main',[
            'sliders'=>Slider::where('active', 0)->get(),
            'menus'=>Menu::select('id','name','thumb')->get(),
            'products'=>Product::where('active',0)->orderByDesc('id')->limit(4)->get(),
        ]);
    }

    public function loadProduct(Request $request){
        $page = $request->input('page',0);
        $result = Product::where('active',0)->orderByDesc('id')->offset($page*4)->limit(4)->get();

        if(count($result) != 0){
            $html = view('list',['products'=> $result])->render();
            return response()->json(['html'=>$html]);
        }
        return response()->json(['html'=>'']);
    }
}
