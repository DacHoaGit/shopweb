<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sliders.list',[
            'title' => 'List sliders',
        ]);
    }

    public function showSlider(){
        return DataTables::of(Slider::orderBy('id', 'DESC'))->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.add',[
            'title' => 'Add slider'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        try {
            slider::create($request->input());
            Session::flash('success', 'Add success');
        } catch (\Throwable $th) {
            Session::flash('error', 'Add false');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {   
        // $str = explode('/', $slider->thumb);
        // dd(array_pop($str));
        return view('admin.sliders.edit',[
            'title' => 'Edit Slider',
            'slider' => $slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success','update success');
            return redirect('/admin/sliders/list');
        } catch (\Throwable $th) {
            Session::flash('error', 'Update error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slider = Slider::where('id',$request->input('id'))->first();
        if($slider){
            $path = str_replace('storage','public',$slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return response()->json([
                'error' => false,
                'message'=>'Delete success'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
