<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function index(Request $request)
    {


        $qty = (int)$request->input('num-product');
        $product_id = (int)$request->input('productId');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return redirect()->back();
        }

        $carts = Session::get('carts')??[];

        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);

        }
        else{
            $carts[$product_id] = $qty;
            Session::put('carts', $carts);
        }
        return redirect('/carts ');
    }
    public function show(){
        if(Session::get('carts')){
            $carts = Session::get('carts') ;
            $productId = array_keys($carts);
            $products = Product::where('active',0)->whereIn('id', $productId)->get();
            return view('carts.list',[
                'products'=>$products,
                'carts'=>$carts
            ]);
        }
        return view('carts.list',[
            'title'=>'Your cart is currently empty!'
        ]);
    }
    public function update(Request $request){
        // dd($request->input());
        Session::put('carts', $request->input('num-product'));
        return redirect('/carts ');
    }
}
