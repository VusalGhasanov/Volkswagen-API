<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\ComponentCustomDetail;
use App\Models\ComponentDetail;
use App\Models\ComponentValueTranslate;
use App\Models\Locale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ComponentController extends Controller
{
    public function create(Request $request)
    {
        $this->validateForm($request);
        $locales = Locale::all();
        $components = ComponentDetail::where('component_id',$request->component_id)->get();
        return view( "admin.components.create",[
            'components'=>$components,
            'page_name'=>$request->page_name,
            'component_id'=>$request->component_id,
            'locales'=>$locales,
            'menu_id'=>$request->menu_id,
            'page_id'=>$request->page_id ? $request->page_id : null
        ]);
    }

    public function store(Request $request)
    {
        $locale = Locale::all();
        $page = Page::find($request->page_id);
        $count = $page->componentsCount($request->component_id);
        $page->components()->attach($request->component_id,['index'=>$count]);
        $comp_page = DB::table('component_page')
            ->where('page_id',$page->id)
            ->where('component_id',$request->component_id)
            ->where('index',$count)
            ->first();
        foreach ($request->all() as $i=>$data)
        {
            if($i != '_token' && $i !='menu_id' && $i !='page_name' && $i !='component_id' && $i != 'page_id')
            {
                if($request->hasFile($i))
                {
                    $image = $this->uploadImage($request, $i);
                    ComponentCustomDetail::create([
                        'component_detail_id'=>$i,
                        'component_page_id'=>$comp_page->id,
                        'value'=>$image
                    ]);
                }else{
                    $comdetails = ComponentCustomDetail::create([
                        'component_detail_id'=>$i,
                        'component_page_id'=>$comp_page->id,
                        'value'=>is_array($data) ? null : $data
                    ]);
                    if(is_array($data))
                    {
                        foreach ($locale as $l)
                        {
                            $comdetails->translations()->create([
                                'locale'=>$l->code,
                                'value'=>$data[$l->code]
                            ]);
                        }
                    }
                }
            }
        }
        return redirect()->route('admin.pages.show',$page->id)->with('success','Komponent yaradıldı');
    }

    public function show(Request $request, $page_id,$component_id,$index)
    {
        $locales = Locale::all();
        $comp_page = DB::table('component_page')
            ->where('page_id',$page_id)
            ->where('component_id',$component_id)
            ->where('index',$index)
            ->first();
        $page = Page::with([
            'components' => function($query) use ($component_id){
                return $query->where('component_id',$component_id);
            },
            'components.details'=>function($query) use($component_id){
                return $query->where('component_id',$component_id);
            },
            'components.details.values' => function($query) use($comp_page){
                return $query->where('component_page_id',$comp_page->id);
            },
            'components.details.values.translations'
        ])->where('id',$page_id)->firstOrFail();
        return view("admin.components.show", [
            'components'=>$page->components[0]->details,
            'locales'=>$locales,
            'page_id'=>$page_id,
            'component_id'=>$component_id,
            'index'=>$index
        ]);
    }

    public function update(Request $request, $id)
    {
        $locale = Locale::all();
        foreach ($request->all() as $i=>$data)
        {
            if($i != '_token' && $i !='page_id' && $i != '_method') {
                $comp = ComponentCustomDetail::find($i);
                if($request->hasFile($i)){
                    $image = $this->uploadImage($request, $i);
                    $comp->update([
                        'value'=>$image
                    ]);
                }else{
                    $comp->update([
                        'value' => is_array($data) ? null : $data
                    ]);
                    if(is_array($data))
                    {
                        foreach ($locale as $l)
                        {
                            $comp->translations()->where('locale',$l->code)->update([
                                'value'=>$data[$l->code]
                            ]);
                        }
                    }
                }
            }
        }
        return redirect()->route('admin.pages.show',$request->page_id)->with('success','Komponent məlumatları dəyişdirildi');
    }

    public function destroy($page_id, $component_id, $index)
    {
        $comp_page = DB::table('component_page')
            ->where('page_id',$page_id)
            ->where('component_id',$component_id)
            ->where('index',$index)
            ->first();
        $values = ComponentCustomDetail::where('component_page_id',$comp_page->id)->get();
        foreach ($values as $vl)
        {
            $vl->delete();
        }
        $page = Page::find($page_id);
        $page->components()->wherePivot('index',$index)->detach($component_id);
        return redirect()->route('admin.pages.show',$page_id)->with('success','Komponent silindi');
    }

    public function validateForm($request)
    {
        return $request->validate([
            'page_name'=>'required',
            'component_id'=>'required',
        ]);
    }

    public function uploadImage($request, $file)
    {
        $extension = $request->file($file)->getClientOriginalExtension();
        $partial = md5(uniqid(time()));
        $folder = now()->format('M');
        $name = $partial.'.'.$extension;
        $request->file($file)->move(public_path($folder),$name);
        return $folder.'/'.$name;
    }
}
