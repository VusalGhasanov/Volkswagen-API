<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['car_id'];
}
