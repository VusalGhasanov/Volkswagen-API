<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Resources\CarResource;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function car($slug)
    {
        $car = new CarResource(Car::where('name',$slug)->first());
        return $car;
    }

    public function cars()
    {
        $cars = Car::orderBy('order','asc')->get();
        return $cars;
    }
}
