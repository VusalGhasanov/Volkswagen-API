<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Credit\CreditStoreRequest;
use App\Http\Requests\Admin\Credit\CreditUpdateRequest;
use App\Models\Car;

class CreditController extends Controller
{
    public $time;

    public function __construct()
    {
        $this->time = [12,24,36,48];
    }

    public function index()
    {
        $cars = Car::with('credits')->has('credits')->paginate(10);
        $allow = Car::doesntHave('credits')->get();
        return view('admin.pages.credit.index',compact('cars','allow'));
    }

    public function create()
    {
        $cars = Car::doesntHave('credits')->get();
        $time = $this->time;
        return view('admin.pages.credit.create',compact('time','cars'));
    }

    public function store(CreditStoreRequest $request)
    {
        $data = $request->validated();
        $car = Car::where('id',$data['car_id'])->first();
        foreach ($this->time as $t)
        {
            $car->credits()->create([
                'initial_payment'=>$data['initial_payment'],
                'commission'=>$data['commission'],
                'month'=>$data['month'][$t],
                'yearly_percent'=>$data['yearly_percent'][$t],
                'insurance_percent'=>$data['insurance_percent'][$t],
            ]);
        }
        return redirect()->route('admin.credits')->with('success','Uğurlu Əməliyyat');
    }

    public function show($id)
    {
        $car = Car::where('id',$id)->firstOrFail();
        $time = $this->time;
        return view('admin.pages.credit.edit',compact('car','time'));
    }

    public function update(CreditUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $car = Car::where('id',$id)->first();
        foreach ($this->time as $t)
        {
            $car->credits()->where('month',$t)->update([
                'initial_payment'=>$data['initial_payment'],
                'commission'=>$data['commission'],
                'yearly_percent'=>$data['yearly_percent'][$t],
                'insurance_percent'=>$data['insurance_percent'][$t],
            ]);
        }
        return redirect()->route('admin.credits')->with('success','Uğurlu Əməliyyat');
    }
}
