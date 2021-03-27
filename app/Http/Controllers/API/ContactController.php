<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $config = Config::first();
        return response()->json(['data' => $config], 200);
    }
}
