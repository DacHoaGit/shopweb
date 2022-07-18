<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('menu')->orderBy('id')->paginate(15);
        // dd($products);
        return view('admin.products.list',[
            'title' => 'List Products',
            'products' => $products
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add',[
            'title'=>'Create Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductRequest $request)
    {   
        // dd($request->input());
        if($request->input('price') != 0 && $request->input('price_sale') != 0 && $request->input('price_sale') >= $request->input('price')){
            Session::flash('error', 'The sale price cannot be greater than the original price');
            return redirect()->back();
        }
        else if($request->input('price_sale') != 0 && $request->input('price_sale') == 0){
            Session::flash('error', 'Please enter original price');
            return redirect()->back();
        }
        try {
            $product = [
                "name" => $request->input('name'),
                "menu_id" =>(int) $request->input('parent_id'),
                "price" => $request->input('price'),
                "price_sale" => $request->input('price_sale'),
                "description" => $request->input('description'),
                "content" =>  $request->input('content'),
                "active" => $request->input('active'),
                "thumb" => $request->input('file'),
            ];
            Product::create($product);
            Session::flash('success', 'Add product success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return redirect()->back();
        }
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.edit',[
            'title' => 'Edit Product',
            'product'=> $product,
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
    public function update(Request $request, Product $product)
    
    {
        if($request->input('price') != 0 && $request->input('price_sale') != 0 && $request->input('price_sale') >= $request->input('price')){
            Session::flash('error', 'The sale price cannot be greater than the original price');
            return redirect()->back();
        }
        else if($request->input('price_sale') != 0 && $request->input('price_sale') == 0){
            Session::flash('error', 'Please enter original price');
            return redirect()->back();
        }
        try {
            $pro = [
                "name" => $request->input('name'),
                "menu_id" =>(int) $request->input('parent_id'),
                "price" => $request->input('price'),
                "price_sale" => $request->input('price_sale'),
                "description" => $request->input('description'),
                "content" =>  $request->input('content'),
                "active" => $request->input('active'),
                "thumb" => $request->input('file'),
            ];
            $product->fill($pro);
            $product->save();
            Session::flash('success', 'Update product success');
            return redirect('/admin/products/list');
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
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
        // dd($request);
        $product = Product::where('id',$request->input('id'))->first();
        
        if($product){
            $product->delete();
            return response()->json([
                'error' => false,
                'message'=>'delete success',
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }

    
}
