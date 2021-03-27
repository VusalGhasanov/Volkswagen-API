<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    public function translations($locale=null){
        if($locale)
        {
            return $this->hasMany(NewsTranslation::class,'news_id')->where('locale',$locale)->first();
        }
        return $this->hasMany(NewsTranslation::class,'news_id');
    }

    public function images()
    {
        return $this->hasMany(NewsImage::class,'news_id');
    }
}
