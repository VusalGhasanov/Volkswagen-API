<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\MenuRequest;
use App\Http\Requests\Admin\Menu\SubMenuRequest;
use App\Models\Locale;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public $locales;

    public function __construct()
    {
        $this->locales = Locale::all();
    }

    public function index()
    {
        $menus = Menu::with('translations')->paginate(10);
        return view('admin.pages.menus.index', compact('menus'));
    }

    public function sub($id)
    {
        $locales = $this->locales;
        return view('admin.pages.menus.sub', compact('id','locales'));
    }

    public function create()
    {
        $locales = $this->locales;
        $pages = Page::all();
        return view('admin.pages.menus.create',compact('locales','pages'));
    }

    public function store(MenuRequest $request)
    {
        $data = $request->validated();
        $menu = Menu::create([
            'parent_id'=>$request->parent_id ? $request->parent_id : 0,
            'page_id'=>$request->page_id ? $request->page_id : 0,
            'link'=>$request->link
        ]);
        foreach ($this->locales as $l)
        {
            $menu->translations()->create([
                'locale'=>$l->code,
                'name'=>$data['name'][$l->code],
            ]);
        }
        return redirect()->route('admin.menus')->with('success','Yeni menu əlavə olundu');
    }

    public function show($id)
    {
        $locales = $this->locales;
        $menu = Menu::findOrFail($id);
        $pages = Page::all();
        return view('admin.pages.menus.show',compact('menu','locales','pages'));
    }

    public function update(MenuRequest $request, $id)
    {
        $data = $request->validated();
        $menu = Menu::find($id);
        $menu->update([
            'page_id'=>$request->page_id,
            'link'=>$request->link
        ]);
        foreach ($this->locales as $l)
        {
            $menu->translations()->where('locale',$l->code)->update([
               'name'=>$data['name'][$l->code]
            ]);
        }
        return redirect()->route('admin.menus')->with('success','Menu dəyişdirildi');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if(!$menu->active)
        {
            $menu->delete();
        }
        return redirect()->route('admin.menus')->with('success','Menu silindi');
    }
}
