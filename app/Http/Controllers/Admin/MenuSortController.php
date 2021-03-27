<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuSortController extends Controller
{
    public function index()
    {
        $main = Menu::where('parent_id', 0)->orderBy('order','asc')->get();
        return view('admin.pages.menus.order', compact('main'));
    }

    public function update(Request $request)
    {
        if($request->mainOrder){
            foreach ($request->mainOrder as $key => $value) {
                Menu::where('parent_id','0')->where('id',$key)->update(['order'=>$value]);
            }
        }
        if($request->subOrder){
            foreach ($request->subOrder as $key => $value) {
                Menu::where('parent_id','<>','0')->where('id',$key)->update(['order'=>$value]);
            }
        }
        if($request->subChildOrder){
            foreach ($request->subChildOrder as $key => $value) {
                Menu::where('parent_id','<>','0')->where('id',$key)->update(['order'=>$value]);
            }
        }

        return redirect()->back();
    }
}
