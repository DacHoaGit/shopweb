<?php

namespace App\Http\Controllers;

use App\Enums\CustomerStatus;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $customers = Customer::where('user_id',$user_id)->get();
        return view('order',[
            'customers' => $customers,
        ]);
    }
    public function payment(Customer $customer){
        if($customer->user_id !== auth()->user()->id){
            return abort(404);
        }

        $payments = Payment::get();
        $carts = $customer->cart;

        return view('payment',[
            'carts' => $carts,
            'payments' => $payments,
            'customer' => $customer
        ]);
    }
    public function updatePayment(Request $request){
        $customer = Customer::where('id',$request->input('customer'))->first();

        if(($customer->user_id  !== auth()->user()->id ) || $customer->status != CustomerStatus::UNPAID){
            return abort(404);
        }
        $customer->status = CustomerStatus::PROCESSING;
        $customer->save();
        
        return redirect('my-order');
    }
}
