<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Credit\CreditStoreRequest;
use App\Http\Requests\Admin\Credit\CreditUpdateRequest;
use App\Http\Requests\Admin\Lising\LisingStoreRequest;
use App\Http\Requests\Admin\Lising\LisingUpdateRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class LisingController extends Controller
{
    public $time;

    public function __construct()
    {
        $this->time = [12,24,36,48];
    }

    public function index()
    {
        $cars = Car::with('lisings')->has('lisings')->paginate(10);
        $allow = Car::doesntHave('lisings')->get();
        return view('admin.pages.lising.index',compact('cars','allow'));
    }

    public function create()
    {
        $cars = Car::doesntHave('lisings')->get();
        $time = $this->time;
        return view('admin.pages.lising.create',compact('time','cars'));
    }

    public function store(LisingStoreRequest $request)
    {
        $data = $request->validated();
        $car = Car::where('id',$data['car_id'])->first();
        foreach ($this->time as $t)
        {
            $car->lisings()->create([
                'month'=>$data['month'][$t],
                'initial_payment'=>$data['initial_payment'],
                'commission'=>$data['commission'],
                'yearly_percent'=>$data['yearly_percent'][$t],
                'insurance_percent'=>$data['insurance_percent'][$t],
                'gps'=>$data['gps'][$t],
            ]);
        }
        return redirect()->route('admin.lising')->with('success','Uğurlu Əməliyyat');
    }

    public function show($id)
    {
        $car = Car::where('id',$id)->firstOrFail();
        $time = $this->time;
        return view('admin.pages.lising.edit',compact('car','time'));
    }

    public function update(LisingUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $car = Car::where('id',$id)->first();
        foreach ($this->time as $t)
        {
            $car->lisings()->where('month',$t)->update([
                'initial_payment'=>$data['initial_payment'],
                'commission'=>$data['commission'],
                'yearly_percent'=>$data['yearly_percent'][$t],
                'insurance_percent'=>$data['insurance_percent'][$t],
                'gps'=>$data['gps'][$t],
            ]);
        }
        return redirect()->route('admin.lising')->with('success','Uğurlu Əməliyyat');
    }
}
