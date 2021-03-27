<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarSortController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('order','asc')->get();
        return view('admin.pages.cars.order', compact('cars'));
    }

    public function update(Request $request)
    {
        if($request->mainOrder){
            foreach ($request->mainOrder as $key => $value) {
                Car::where('id',$key)->update(['order'=>$value]);
            }
        }
        return redirect()->back();
    }
}
