<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Response;

class CreditController extends Controller
{
    public function index()
    {
        $cars = Car::whereHas('credits')->orWhereHas('lisings')->orderBy('order','asc')->get();
        return response()->json($cars,Response::HTTP_OK);
    }

    public function findById($id)
    {
        $car = Car::with('models','lisings','credits')->where('id',$id)->first();
        return response()->json($car,Response::HTTP_OK);
    }
}
