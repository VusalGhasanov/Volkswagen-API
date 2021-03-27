<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class NavigationController extends Controller
{
    public function index()
    {
        $main = Menu::where('parent_id', 0)->orderBy('order','asc')->get();
        $main = $main->map(function ($value) {
            $value['name'] = $value->translations(app()->getLocale()) ?
                $value->translations(app()->getLocale())->name :
                null;
            $value['slug'] = $value->page ? $value->page->slug : null;
            return $value;
        });
        $arr = [];
        $sub_arr = [];
        foreach ($main as $i => $m) {
            $arr[$i] = $m;
            $sub = Menu::where('parent_id', $m->id)->orderBy('order','asc')->get();
            $sub = $sub->map(function ($value){
                $value['name'] = $value->translations(app()->getLocale()) ?
                    $value->translations(app()->getLocale())->name :
                    null;
                $value['slug'] = $value->page ? $value->page->slug : null;
                $sub_cat = Menu::where('parent_id',$value['id'])->orderBy('order','asc')->get();
                $sub_cat = $sub_cat->map(function ($v){
                    $v['name'] = $v->translations(app()->getLocale()) ?
                        $v->translations(app()->getLocale())->name :
                        null;
                    $v['slug'] = $v->page ? $v->page->slug : null;
                    return $v;
                });
                $value['sub_child'] = $sub_cat;
                return $value;
            });
            $arr[$i]['child'] = $sub;
        }
        return response()->json(['data' => $arr], 200);

    }
}
