<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }

    public function credits($month = null)
    {
        if($month)
        {
            return $this->hasMany(Credit::class)->where('month',$month)->first();
        }
        return $this->hasMany(Credit::class);
    }

    public function lisings($month = null)
    {
        if($month)
        {
            return $this->hasMany(Lising::class)->where('month',$month)->first();
        }
        return $this->hasMany(Lising::class);
    }

    public function files($locale = null)
    {
        if ($locale)
        {
            return $this->hasMany(File::class)->where('locale',$locale)->first();
        }
        return $this->hasMany(File::class);
    }
}
