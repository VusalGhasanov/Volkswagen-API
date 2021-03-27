<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $read = Forum::where('status','read')->paginate(6);
        $unread = Forum::where('status','unread')->paginate(6);
        return view('admin.pages.forms.index',compact('read','unread'));
    }

    public function show($id)
    {
        $forum = Forum::where('id',$id)->firstOrFail();
        $car = Car::find($forum->car_id) ? Car::find($forum->car_id)->name : null;
        if($forum->status == 'unread')
        {
            $forum->update(['status'=>'read']);
        }
        return view('admin.pages.forms.show',compact('forum','car'));
    }

    public function destroy($id)
    {
        Forum::destroy($id);
        return redirect()->route('admin.forums')->with('success','Form məlumatı silindi');
    }
}
