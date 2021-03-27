<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentCustomDetail extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['component_detail_id', 'component_page_id'];

    public function translations($locale = null)
    {
        if ($locale) {
            return $this->hasMany(ComponentValueTranslate::class)->where('locale', $locale)->first();
        }
        return $this->hasMany(ComponentValueTranslate::class);
    }
}
