<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'menu_id',
        'description',
        'content',
        'active',
        'price',
        'price_sale',
        'thumb'
    ];
    public function menu(){
        return $this->belongsTo(Menu::class)->withDefault(['name'=>'']);
    }
}
