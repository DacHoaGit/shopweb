<?php

namespace App\Exports;

use App\Models\Cart;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BillExport implements FromView
{   
    public $carts;
    public Customer $customer;

    public function __construct($carts,Customer $customer,)
    {
        $this->carts = $carts;
        $this->customer = $customer;
    }

    public function getCarts(){
        return $this->carts;
    }

    public function getCustomer(){
        return $this->customer;
    }
    public function view(): View

    {
        $cart = $this->getCarts();
        $cus = $this->getCustomer();
        
        return view('admin.bill-export',[
            'carts' => $cart,
            'customer' => $cus,
        ]);
    }
}
