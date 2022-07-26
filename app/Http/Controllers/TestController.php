<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $type = [
            'pdf'=>'book',
            'arri'=>'marri'
            ]['arri'];
        return $type;
    }
}
