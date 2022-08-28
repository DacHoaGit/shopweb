<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BillExport;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    public function index()
    {
        return view('admin.customer.list',[
            'title' => 'Customer List',
        ]);
    }

    public function showCustomer(Request $request){

        if(!is_null($request->input('start_date'))){
            $start = $request->input('start_date');
            $end = $request->input('end_date');
            return DataTables::of(Customer::whereBetween('created_at',[$start,$end])->orderBy('id', 'DESC'))->make(true);
        }
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
    public function export(Customer $customer) {
        $carts = $customer->cart()->with(['product'=> function($q){
            $q->select('id', 'name', 'thumb');
        }])->get();

        return Excel::download(new BillExport($carts,$customer), 'bill.xlsx');
    }
}
