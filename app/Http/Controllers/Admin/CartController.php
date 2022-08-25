<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    public function index()
    {
        return view('admin.customer.list',[
            'title' => 'Customer List',
        ]);
    }

    public function showCustomer(){
        return DataTables::of(Customer::orderBy('id', 'DESC'))->make(true);
    }

    public function detail(Customer $customer)
    {
        $carts = $customer->cart()->with(['product'=> function($q){
            $q->select('id', 'name', 'thumb');
        }])->get();
        return view('admin.customer.detail',[
            'title' => 'Customer Information',
            'customer'=>$customer,
            'carts'=>$carts,
        ]);
    }

    public function update(Request $request)
    {   
        if(\App\Enums\CustomerStatus::hasValue((int)$request->input('statusId'))){
            Customer::where('id',(int)$request->input('customer'))->update(['status' => (int)$request->input('statusId')]);
            // $customer->save();
            return response()->json([
                'status' => true,
            ]);
        }
        return response()->json([
            'status' => false,
        ]);
    }
}
