<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function translations($locale=null){
        if($locale)
        {
            return $this->hasMany(PageTranslate::class,'page_id')->where('locale',$locale)->first();
        }
        return $this->hasMany(PageTranslate::class,'page_id');
    }

    public function components()
    {
        return $this->belongsToMany(Component::class)->withPivot('order','index');
    }

    public function componentsCount($id)
    {
        return $this->belongsToMany(Component::class)->withPivot('order','index')->where('component_id',$id)->count();
    }

    public function menu()
    {
        return $this->hasOne(Menu::class);
    }
}
