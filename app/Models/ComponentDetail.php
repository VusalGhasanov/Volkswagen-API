<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentDetail extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['component_id', 'type', 'element'];

    public function values()
    {
        return $this->hasMany(ComponentCustomDetail::class);
    }

    public function valueId()
    {
        return $this->hasMany(ComponentCustomDetail::class)->select('id')->first();
    }
}
