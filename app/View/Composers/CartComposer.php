<?php
 
namespace App\View\Composers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
 
class CartComposer
{


    public function __construct()
    {
        
    }
 
    public function compose(View $view)
    {
        $carts=  Session::get('carts');
        if(isset($carts)){
            $productId = array_keys($carts);
            $products = Product::query()->where('active', 0)
                ->whereIn('id', $productId)->get()
                ->map(function($each)use ($carts){
                    $each->qty = $carts[$each->id];
                    return $each;
                });
            $view->with('productCarts', $products);
        }
    }
}