<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller

{
    // protected $menu;

    // public function __construct($menu)
    // {
    //     $this->$menu = $menu;
    // }

    public function index(Request $request, $id, $slug)
    {
        $menu = Menu::where('id',$id)->where('active',0)->firstOrFail();
        $products = $menu->products()->where('active', 0);
        if($request->input('price')){
            $products->orderBy('price_sale',$request->input('price'));
        }
        return view('menu',[
            'title'=>$menu->name,
            'products'=>$products->orderByDesc('id')->paginate(4)->appends(request()->query()),
            'menu'=>$menu
        ]);
    }
    
}
