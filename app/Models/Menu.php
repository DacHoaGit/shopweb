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
    ];
    public function getParent(){
        return $this->parent_id;
    }
}
