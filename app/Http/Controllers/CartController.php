<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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


        Session::put('carts', $request->input('num-product'));
        return redirect('/carts ');
    }

    public function delete(Request $request){
        $carts = Session::get('carts');
        unset($carts[$request->input('id')]);
        Session::put('carts', $carts);
        return response()->json([
            'error' => false,
            'message'=>'delete success',
        ]);
    }

    public function addCard(Request $request){
        $address = $request->input('ward').', '.$request->input('district').', '.$request->input('city');
        try {

            DB::beginTransaction();
            $carts = Session::get('carts');
            if (is_null($carts)) {
                return redirect()->back();
            }
        
            $customer = Customer::create([
                'name' =>$request->input('name'),
                'address' =>$address,
                'phone' =>$request->input('phone'),
                'note' =>$request->input('note'),
            ]);

            $productId = array_keys($carts);
            $products = Product::where('active',0)->whereIn('id', $productId)->get();

            foreach ($products as $product) {
                Cart::create([
                    'customer_id' =>$customer->id,
                    'product_id' =>$product->id,
                    'quantity' =>$carts[$product->id],
                    'price' =>$product->price_sale,
                ]);
            }
            DB::commit();
            Session::flash('success', 'Order Error');
            Session::forget('carts');
            return redirect()->back();
            
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('error', 'Order Error');
            return redirect()->back();
        }

    }
}
