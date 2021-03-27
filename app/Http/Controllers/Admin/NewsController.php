<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\NewsStorerequest;
use App\Http\Requests\Admin\News\NewsUpdateRequest;
use App\Models\Locale;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10);
        return view('admin.pages.news.index',compact('news'));
    }

    public function create()
    {
        $locale = Locale::all();
        return view('admin.pages.news.create',compact('locale'));
    }

    public function store(NewsStorerequest $request)
    {
        $data = $request->validated();
        $news = News::create([
            'slug'=>Str::slug($data['title']['az']),
        ]);
        $locale = Locale::all();
        foreach ($locale as $l)
        {
            $news->translations()->create([
               'locale'=>$l->code,
                'title'=>$data['title'][$l->code],
                'description'=>$data['description'][$l->code]
            ]);
        }
        foreach ($request->images as $image)
        {
            $name = $this->uploadImage($image);
            $news->images()->create(['url'=>$name]);
        }
        return redirect()->route('admin.news')->with('success','Xəbər əlavə olundu');
    }

    public function show($id)
    {
        $locale = Locale::all();
        $news = News::where('id',$id)->with('translations')->firstOrFail();
        return view('admin.pages.news.show',compact('locale','news'));
    }

    public function update(NewsUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $news = News::find($id);
        $news->update(['slug'=>Str::slug($data['title']['az'])]);
        $locale = Locale::all();
        foreach ($locale as $l)
        {
            $news->translations()->where('locale',$l->code)->update([
               'title'=>$data['title'][$l->code],
               'description'=>$data['description'][$l->code]
            ]);
        }
        if($request->hasFile('images'))
        {
            foreach ($news->images as $image)
            {
                if(file_exists(public_path($image->url)))
                {
                    unlink(public_path($image->url));
                }
                $image->delete();
            }
            foreach ($request->images as $image)
            {
                $name = $this->uploadImage($image);
                $news->images()->create(['url'=>$name]);
            }
        }
        return redirect()->route('admin.news')->with('success','Xəbər məlumatları dəyişdirildi');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        foreach ($news->images as $image)
        {
            if(file_exists(public_path($image->url)))
            {
                unlink(public_path($image->url));
            }
        }
        $news->delete();
        return redirect()->route('admin.news')->with('success','Xəbər silindi');
    }

    public function uploadImage($image)
    {
        $extension = $image->getClientOriginalExtension();
        $partial = md5(uniqid(time()));
        $folder = 'news';
        $name = $partial.'.'.$extension;
        $image->move(public_path($folder),$name);
        return $folder.'/'.$name;
    }
}
