<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function translations($locale=null){
        if($locale)
        {
            return $this->hasMany(MenuTranslate::class)->where('locale',$locale)->first();
        }
        return $this->hasMany(MenuTranslate::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id');
    }
}
