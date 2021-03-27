<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Car\CarStoreRequest;
use App\Http\Requests\Admin\Car\CarUpdateRequest;
use App\Models\Car;
use App\Models\Locale;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(10);
        return view('admin.pages.cars.index',compact('cars'));
    }

    public function create()
    {
        $locale = Locale::all();
        return view('admin.pages.cars.create',compact('locale'));
    }

    public function store(CarStoreRequest $request)
    {
        $data = $request->validated();
        $locale = Locale::all();
        $main_img = $this->uploadImage($request, 'image_1');
        $hover_img = $this->uploadImage($request, 'image_2');
        $car = Car::create([
            'name'=>$data['name'],
            'color' => $data['color'],
            'font_color' => $data['font_color'],
            'main_img'=>$main_img,
            'hover_img'=>$hover_img,
        ]);
        if ($request->has('model_name') && $request->has('price'))
        {
            for ($i = 0; $i< count($request->model_name);$i++)
            {
                $car->models()->create([
                    'name'=>$data['model_name'][$i],
                    'price'=>$data['price'][$i],
                ]);
            }
        }
        if ($request->has('price_list'))
        {
            foreach ($locale as $l)
            {
                $car->files()->create([
                    'locale'=>$l->code,
                    'url'=>$this->uploadImageArray($request, $data['price_list'][$l->code])
                ]);
            }
        }
        return redirect()->route('admin.cars')->with('success','Avtomobil əlavə olundu');
    }

    public function show($id)
    {
        $car = Car::where('id',$id)->firstOrFail();
        $locale = Locale::all();
        return view('admin.pages.cars.show',compact('car','locale'));
    }

    public function update(CarUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $locale = Locale::all();
        $car = Car::find($id);
        $car->update([
            'name'=>$data['name'],
            'color' => $data['color'],
            'font_color' => $data['font_color'],
        ]);
        if($request->hasFile('image_1'))
        {
            if(file_exists(public_path($car->main_img)))
            {
                unlink(public_path($car->main_img));
            }
            $image_1 = $this->uploadImage($request,'image_1');
            $car->update(['main_img'=>$image_1]);
        }
        if($request->hasFile('image_2'))
        {
            if(file_exists(public_path($car->hover_img)))
            {
                unlink(public_path($car->hover_img));
            }
            $image_2 = $this->uploadImage($request,'image_2');
            $car->update(['hover_img'=>$image_2]);
        }
        if ($request->has('model_name') && $request->has('price'))
        {
            $car->models()->delete();
            for ($i = 0; $i< count($request->model_name);$i++)
            {
                $car->models()->create([
                    'name'=>$data['model_name'][$i],
                    'price'=>$data['price'][$i],
                ]);
            }
        }
        if ($request->has('price_list'))
        {
            foreach ($locale as $l)
            {
                if ($request->file('price_list.'.$l->code))
                {
                    $car->files()->where('locale',$l->code)->updateOrCreate([
                        'locale'=>$l->code,
                        'url'=>$this->uploadImageArray($request, $data['price_list'][$l->code])
                    ]);
                }
            }
        }
        return redirect()->route('admin.cars')->with('success','Avtomobil məlumatları dəyişdirildi');
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        if(file_exists(public_path($car->hover_img)))
        {
            unlink(public_path($car->hover_img));
        }
        if(file_exists(public_path($car->main_img)))
        {
            unlink(public_path($car->main_img));
        }
        $car->delete();
        return redirect()->route('admin.cars')->with('success','Avtomobil məlumatları silindi');
    }

    public function uploadImage($request, $file)
    {
        $extension = $request->file($file)->getClientOriginalExtension();
        $partial = md5(uniqid(time()));
        $folder = 'cars';
        $name = $partial.'.'.$extension;
        $request->file($file)->move(public_path($folder),$name);
        return $folder.'/'.$name;
    }

    public function uploadImageArray($request, $file)
    {
        $extension = $file->getClientOriginalExtension();
        $partial = md5(uniqid(time()));
        $folder = 'cars';
        $name = $partial.'.'.$extension;
        $file->move(public_path($folder),$name);
        return $folder.'/'.$name;
    }
}
