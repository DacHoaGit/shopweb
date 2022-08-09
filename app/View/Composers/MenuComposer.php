<?php
 
namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;
 
class MenuComposer
{


    public function __construct()
    {
        
    }
 
    public function compose(View $view)
    {
        $menus =  Menu::query()->with('childrenMenus')->where('parent_id',0)->where('active',0)->orderByDesc('id')->get();
        $view->with('menus',$menus);
    }
}