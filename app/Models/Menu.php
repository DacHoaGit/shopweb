<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected  $table ,$fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'active',
        'thumb',
    ];
    public function products(){
        return $this->hasMany(Product::class,'menu_id','id');
    }

    public function childrenMenus()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }
}
