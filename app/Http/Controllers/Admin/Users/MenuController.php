<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\menu\CreateFormRequest;
use App\Http\Services\menu\MenuService;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Menu::query();
    }

    public function create(){
        $parent_id = $this->model->where('parent_id', 0)->get();
        return view('admin.menus.add',[
            'title'=>'Create',
            'menus'=>$parent_id,
        ]);

    }

    public function show(Menu $menu){
        return view('admin.menus.edit',[
            'title'=>'Edit'.$menu->name,
            'menu'=>$menu,
            'menus'=> $this->model->where('parent_id', 0)->get(),
        ]);
    }
    
    public function update(Menu $menu, CreateFormRequest $request){
        if($request->input('parent_id')!=$menu->id)
            $menu->parent_id = (int) $request->input('parent_id');
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (int) $request->input('active');
        $menu->save();
        Session::flash('success', 'Edit Success');
        return redirect('/admin/menus/list');
    }
    

    public function store(CreateFormRequest $request){
        $arr = [
            'name'=>(string) $request->input('name'),
            'parent_id'=>(int) $request->input('parent_id'),
            'description'=>(string) $request->input('description'),
            'content'=>(string) $request->input('content'),
            'active'=>(int) $request->input('active'),
            ];
        $this->model->create($arr);
        Session::flash('success','create success');
        return redirect()->back();
    }

    public function list(){
        return $this->model->where('parent_id', 0)->simplepaginate();
    }

    public function index(){
        $menus = $this->model->orderBy('id', 'DESC')->paginate(20);

        return view('admin.menus.list',[
            'title'=>'Category List',
            'menus'=>$menus
        ]);
    }


    public function destroy(Request $request){
        $id = (int) $request->input('id');
        $menu = Menu::where('id',$id)->first();
        if($menu){
            Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
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
