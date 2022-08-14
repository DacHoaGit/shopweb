<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('welcome');

    }
}
