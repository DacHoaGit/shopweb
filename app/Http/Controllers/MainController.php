<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\slider;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function index(Request $request){

        $products = Product::where('active',0)->get()->map(function($product){
            $product->sort_price = ($product->price_sale == 0) ? $product->price : $product->price_sale;
            return $product;
        });

        if($request->input('price') == 'desc'){
            $products = $products->sortByDesc('sort_price');
        }

        if($request->input('price') == 'asc'){
            $products = $products->sortBy('sort_price');
        }
        return view('main',[
            'sliders'=>Slider::where('active', 0)->get(),
            'menus'=>Menu::select('id','name','thumb')->get(),
            'products'=>$products->take(16),
        ]);
    }

    public function loadProduct(Request $request){
        $page = $request->input('page',0);
        $result = Product::where('active',0)->orderByDesc('id')->offset($page*16)->limit(16)->get();

        if(count($result) != 0){
            $html = view('list',['products'=> $result])->render();
            return response()->json(['html'=>$html]);
        }
        return response()->json(['html'=>'']);
    }

    public function searchProducts(Request $request){
        $products = Product::where('active', 0)->where('name','like',"%{$request->input('q')}%")->get();
        if(count($products)>0){
            return view('search-product-result', ['products' => $products]);
        }
        return response()->json([
            'success' => false
        ]);
    }
}


