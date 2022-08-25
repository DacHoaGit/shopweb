<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'user_id',
        'note'
    ];
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function getQuantityAttribute(){

        $quantity = 0;
        $carts = $this->cart;
        foreach($carts as $each){
            $quantity += $each->quantity;
        }
        return $quantity;
    }

    public function getTotalPriceAttribute(){
        $total = 0;
        $carts = $this->cart;
        foreach($carts as $each){
            $total += ($each->quantity*$each->price);
        }
        return $total;
    }

    
}
