<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Models\Component;
use App\Models\Locale;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class PageController extends Controller
{
    public $locale;

    public function __construct()
    {
        $this->locale = new Locale();
    }

    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.pages.site_pages.index', compact('pages'));
    }

    public function create()
    {
        $locale = $this->locale->all();
        return view('admin.pages.site_pages.create', compact('locale'));
    }

    public function store(PageRequest $request)
    {
        $data = $request->validated();
        $page = Page::create([
            'name'=>$data['title']['az'],
            'slug'=>Str::slug($data['title']['az']),
        ]);
        foreach ($this->locale->all() as $l)
        {
            $page->translations()->create([
                'locale'=>$l->code,
                'title'=>$data['title'][$l->code],
                'description'=>$data['description'][$l->code]
            ]);
        }
        return redirect()->route('admin.pages.show',$page->id)->with('success','Səhifə yaradıldı');
    }

    public function show($id)
    {
        $page = Page::with([
            'components'=>function($q){
                return $q->orderBy('order','asc');
            },
        ])->where('id',$id)->firstOrFail();
        $components = Component::all();
        return view('admin.pages.site_pages.show', compact('components','page'));
    }

    public function edit($id)
    {
        $page = Page::with('translations')->where('id',$id)->firstOrFail();
        $locale = $this->locale->all();
        return view('admin.pages.site_pages.edit', compact('locale','page'));
    }

    public function update(PageRequest $request, $id)
    {
        $data = $request->validated();
        $page = Page::find($id);
        foreach ($this->locale->all() as $l)
        {
            $page->translations()->where('locale',$l->code)->update([
                'locale'=>$l->code,
                'title'=>$data['title'][$l->code],
                'description'=>$data['description'][$l->code]
            ]);
        }
        return redirect()->route('admin.pages.show',$page->id)->with('success','Səhifə məlumatları dəyişdirildi');
    }

    public function destroy($id)
    {
        $page = Page::with([
            'components',
            'components.details',
            'components.details.values'
        ])->where('id',$id)->first();
        $page->components()->detach();
        $page->destroy($id);
        return redirect()->route('admin.pages')->with('success','Səhifə silindi');
    }

}
