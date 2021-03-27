<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function pages()
    {
        return $this->belongsToMany(Menu::class)->withPivot('order', 'index');
    }

    public function details()
    {
        return $this->hasMany(ComponentDetail::class);
    }

    public function values()
    {
        return $this->hasMany(ComponentPage::class, 'component_id');
    }
}
