<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::whereYear('created_at',Carbon::now()->format('Y'))->get();
        $news = $news->map(function ($value) {
            $value['title'] = $value->translations(app()->getLocale()) ? $value->translations(app()->getLocale())->title : null;
            $value['description'] = $value->translations(app()->getLocale()) ? $value->translations(app()->getLocale())->description : null;
            $value['images'] = $value->images->map(function ($val){
               return $val;
            });

            return $value;
        });
        $news = $news->groupBy(function ($val){
            return Carbon::parse($val->created_at)->format('m');
        });
        return response()->json(['data' => $news], 200);
    }

//    public function findBySlug($slug)
//    {
//        $news = News::where('slug', $slug)->firstOrFail()->get();
//        $news = $news->map(function ($value) {
//            $value['title'] = $value->translations(app()->getLocale())->title;
//            $value['description'] = $value->translations(app()->getLocale())->description;
//            $value['images'] = $value->images->map(function ($val){
//                return $val;
//            });
//            return $value;
//        });
//        return response()->json(['data' => $news], 200);
//    }
}
