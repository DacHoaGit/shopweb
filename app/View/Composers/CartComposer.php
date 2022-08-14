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
            
            $productIds = array_keys($carts);

            // delete products not active in session
            $ProductNoActives = Product::query()->whereIn('id', $productIds)->where('active', 1)->get();
            foreach ($ProductNoActives as $each){
                unset($carts[$each->id]);
            }
            Session::put('carts', $carts);
            //
            $products = Product::query()->whereIn('id', $productIds)
                ->where('active', 0)
                ->get()
                ->map(function($each)use ($carts){
                    $each->qty = $carts[$each->id];
                        return $each;
                });
            $view->with('productCarts', $products);
        }

    }
}