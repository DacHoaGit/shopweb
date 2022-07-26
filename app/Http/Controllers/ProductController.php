<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id, $slug){
        $product = Product::where('id',$id)->where('active',0)->with('menu')->firstOrFail();
        $products = Product::where('active', 0)->where('id', '!=', $id)->orderByDesc('id')->limit(8)->get();
        // dd($products);
        // dd($product->menu->name);
        return view('product',[
            'title'=>$product->name,
            'product'=>$product,
            'products'=>$products
        ]);
    }
}
