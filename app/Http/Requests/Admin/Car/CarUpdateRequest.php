<?php

namespace App\Http\Requests\Admin\Car;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
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
            'color' => 'required',
            'font_color' => 'required',
            'image_1'=>'nullable',
            'image_2'=>'nullable',
            'price_list.*' =>'sometimes|mimes:pdf'
        ];
    }
}
