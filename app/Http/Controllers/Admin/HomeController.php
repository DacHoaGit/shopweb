<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index(){

        return view('admin.index',[
            'title'=>'Home',

        ]);
    }

    public function updateCookie(){
        $count = $_COOKIE['countNotify'] + 1;
        setcookie('countNotify',$count);
    }

    public function filterDay(Request $request){
        $from = Carbon::parse($request->input('dateFrom'))->startOfDay();
        $to = Carbon::parse($request->input('dateTo'))->endOfDay();

        $totalOrder = Customer::whereBetween('created_at',[$from,$to])->count();

        $totalOrderUnpaid = Customer::whereBetween('created_at',[$from,$to])->where('status',0)->count();
        $totalOrderProcess = Customer::whereBetween('created_at',[$from,$to])->where('status',1)->count();
        $totalOrderShiped = Customer::whereBetween('created_at',[$from,$to])->where('status',2)->count();
        $totalOrderCancel = Customer::whereBetween('created_at',[$from,$to])->where('status',3)->count();
        
        $totalUser = User::where('role',1)->whereBetween('updated_at',[$from,$to])->count();


        $productSold = Customer::where('status',2)->whereBetween('updated_at',[$from,$to])->get();
        $totalProductSold = 0;
        $totalPrice = 0;
        foreach ($productSold as $each){
            $totalProductSold += $each->quantity;
            $totalPrice += $each->total_price;
        }

        return response()->json([   
            'totalOrder' => $totalOrder,
            'totalProductSold' => $totalProductSold,
            'totalPrice' => $totalPrice,
            'totalUser' => $totalUser,
            'totalUnpaid' => $totalOrderUnpaid,
            'totalProcess' => $totalOrderProcess,
            'totalShiped' => $totalOrderShiped,
            'totalCancel' => $totalOrderCancel,
        ]);
    }
}
