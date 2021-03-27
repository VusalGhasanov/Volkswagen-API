<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserLoginRequest;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = array_merge($request->validated(),['password'=>Hash::make($request->password)]);
        User::create($user);
        return redirect()->route('admin.users')->with('success','Yeni istifadəçi əlavə olundu');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.show', compact('user'));
    }

    public function update(UserUpdateRequest $request,$id)
    {
        $data = $request->validated();
        if($request->password)
        {
            $data = array_merge($request->validated(), ['password'=>Hash::make($request->password)]);
        }
        $user = User::find($id);
        $user->update($data);
        return redirect()->route('admin.users')->with('success','İstifadəçi məlumatları dəyişdirildi');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users')->with('success','İstifadəçi silindi');
    }

    public function login()
    {
        return view('admin.pages.login');
    }

    public function loginControl(UserLoginRequest $request)
    {
        $user = $request->validated();
        $control = Auth::guard('admin')->attempt($user);
        if($control)
        {
            return redirect()->route('admin.home')->with('success','Admin panelə daxil oldunuz');
        }
        return redirect()->back()->with('error','Daxil etdiyiniz məlumatlar yanlışdır');
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        return redirect()->route('admin.login');
    }
}
