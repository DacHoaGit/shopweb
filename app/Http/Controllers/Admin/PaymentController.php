<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function create(){
        return view('admin.payments.add',[
            'title'=>'Add Payment'
        ]);
    }
    
    public function store(Request $request){
        try {
            DB::beginTransaction();
            Payment::create($request->input());
            DB::commit();
            Session::flash('success','Create Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('error','Create Error');
        }
        return redirect()->back();
    }

    public function index(){
        
        return view('admin.payments.list',[
            'title' => 'List Payments',
        ]);
    }

    public function showPayment(){
        return DataTables::of(Payment::orderBy('id', 'DESC'))->make(true);
    }

    public function show(Payment $payment){

        return view('admin.payments.edit',[
            'title' => 'Edit Method Payment',
            'payment' => $payment
        ]);
    }

    public function update(Request $request, Payment $payment){
        try {
            DB::beginTransaction();
            $payment->fill($request->input());
            $payment->save();
            DB::commit();
            Session::flash('success','update success');
            return redirect('/admin/payments/list');
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('error', 'Update error');
            return redirect()->back();
        }
    }

    public function destroy(Request $request) {
        try {
            DB::beginTransaction();
            Payment::find($request->input('id'))->delete();
            DB::commit();
            return response()->json([
                'error' => false,
                'message'=>'Delete success'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'error' => true
            ]);
        }
    }
}
