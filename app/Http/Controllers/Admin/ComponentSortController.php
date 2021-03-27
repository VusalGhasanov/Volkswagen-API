<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;

class ComponentSortController extends Controller
{
    public function update(Request $request)
    {
        $page = Page::find($request->page_id);

        if($request->subOrder){
            foreach ($request->subOrder as $key => $value)
            {
                foreach ($value as $k=>$v)
                {
                    $page->components()->where('component_id',$key)->where('index',$k)->update(['order'=>$v]);
                }
            }
        }
        return redirect()->back();
    }
}
