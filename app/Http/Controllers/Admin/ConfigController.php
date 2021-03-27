<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Config\ConfigRequest;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function show()
    {
        $configs = Config::firstOrFail();
        return view('admin.pages.site.show',compact('configs'));
    }

    public function update(ConfigRequest $request)
    {
        $data = $request->validated();
        Config::where('id',1)->update($data);
        return redirect()->back()->with('Məlumatlar dəyişdirildi');
    }
}
