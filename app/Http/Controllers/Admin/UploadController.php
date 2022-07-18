<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $upload;
    public function store(Request $request){
        // dd($request->hasFile('file'));
        if($request->hasFile('file')){
            try {
                $name = $request->file('file')->getClientOriginalName();
                // dd($name);
                $pathFull = 'uploads/'.date('Y-m-d');
                $path = $request->file('file')->storeAs(
                    'public/'. $pathFull,$name
                );
                $url =  '/storage/' . $pathFull . '/' . $name;
                return response()->json([
                    'error' => 'false',
                    'url' => $url,
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'error' => 'true',
                    // 'url' => '/storage/' . $pathFull . '/' . $name,
                ]);
            }
            
        }
    }
}
