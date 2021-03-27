<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['news_id'];
}
