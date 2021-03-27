<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\Suggest;
use App\Mail\TestDrive;
use App\Models\Car;
use App\Models\Forum;
use App\Models\Suggest as SuggestForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForumController extends Controller
{

    public function testDriveForum(Request $request)
    {
        $forum = Forum::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'car_id' => $request->carId
        ]);
        $car = Car::find($request->carId);
        $forum->car = $car->name;
        Mail::send(new TestDrive($forum));
        return response()->json('Successful', 200);
    }

    public function suggestForum(Request $request)
    {
        $forum = SuggestForum::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'car_id' => $request->carId
        ]);
        $car = Car::find($request->carId);
        $forum->car = $car->name;
        Mail::send(new Suggest($forum));
        return response()->json('Successful', 200);
    }
}
