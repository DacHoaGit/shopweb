<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        //get total order in current month
        $totalCurrentMonth = Cart::where('created_at', '>', Carbon::now()->startOfMonth()) ->where('created_at', '<', Carbon::now()->endOfMonth()) ->count();
        $totalLastMonth = Cart::where('created_at', '>', Carbon::now()->subMonth()->startOfMonth()) ->where('created_at', '<', Carbon::now()->subMonth()->endOfMonth()) ->count();
        $rateOrder = ($totalCurrentMonth-$totalLastMonth)/$totalLastMonth;

        return view('admin.index',[
            'title'=>'Home',
            'totalMonth' => $totalCurrentMonth,
            'rateOrder' => $rateOrder
        ]);
    }

}
