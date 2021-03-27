<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Suggest;

class SuggestController extends Controller
{
    public function index()
    {
        $rea = Suggest::where('status','read')->paginate(6);
        $uread = Suggest::where('status','unread')->paginate(6);
        return view('admin.pages.suggests.list',compact('rea','uread'));
    }

    public function show($id)
    {
        $forum = Suggest::where('id',$id)->firstOrFail();
        $car = Car::find($forum->car_id) ? Car::find($forum->car_id)->name : null;
        if($forum->status == 'unread')
        {
            $forum->update(['status'=>'read']);
        }
        return view('admin.pages.suggests.show',compact('forum','car'));
    }

    public function destroy($id)
    {
        Suggest::destroy($id);
        return redirect()->route('admin.suggests')->with('success','Form məlumatı silindi');
    }
}
