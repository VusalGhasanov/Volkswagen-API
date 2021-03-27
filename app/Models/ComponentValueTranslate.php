<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentValueTranslate extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['component_custom_detail_id'];
}
