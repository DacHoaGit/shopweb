<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Helper{
    public static function menu($menus,$parent_id = 0 ,$char = ""){
        $html = '';

        foreach ($menus as $key => $menu) {
            if($menu->parent_id == $parent_id){
                $html .='
                <tr>
                    <td>'. $menu->id .'</td>
                    <td>'. $char . $menu->name .'</td>
                    <td>'. (($menu->active==0)? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Deactive</span>') .'</td>
                    <td>'. $menu->updated_at .'</td>
                    <td class="table-action">
                        <a href="/admin/menus/edit/'.$menu->id.'"'.'class="action-icon"> <i class=" mdi mdi-pencil"></i></a>
                        <a href="#" class="action-icon btn-delete" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')"> <i class=" mdi mdi-delete"></i></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                ';
                unset($menus[$key]);
                $html .=self::menu($menus,$menu->id,$char .'  ---');
            }
        }
        return ($html);
    }
    // public static function menus($menus, $parent_id = 0) :string
    // {
    //     $html = '';
    //     foreach ($menus as $key => $menu) {
    //         if ($menu->parent_id == $parent_id) {
    //             $html .= '
    //                 <li>
    //                     <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
    //                         ' . $menu->name . '
    //                     </a>';

    //             unset($menus[$key]);

    //             if (self::isChild($menus, $menu->id)) {
    //                 $html .= '<ul class="sub-menu">';
    //                 $html .= self::menus($menus, $menu->id);
    //                 $html .= '</ul>';
    //             }

    //             $html .= '</li>';
    //         }
    //     }

    //     return $html;
    // }

    // public static function isChild($menus, $id) : bool
    // {
    //     foreach ($menus as $menu) {
    //         if ($menu->parent_id == $id) {
    //             return true;
    //         }
    //     }

    //     return false;
    // }
}
