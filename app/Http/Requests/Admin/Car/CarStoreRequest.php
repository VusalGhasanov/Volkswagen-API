<?php

namespace App\Http\Requests\Admin\Car;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'model_name.*'=>'required',
            'price.*'=>'required|numeric',
            'image_1'=>['required'],
            'image_2'=>['required'],
            'color' => 'required',
            'font_color' => 'required',
            'price_list.*' =>'required|mimes:pdf'
        ];
    }
}
