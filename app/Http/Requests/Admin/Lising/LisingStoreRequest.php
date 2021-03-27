<?php

namespace App\Http\Requests\Admin\Lising;

use Illuminate\Foundation\Http\FormRequest;

class LisingStoreRequest extends FormRequest
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
            'car_id'=>'required|integer',
            'initial_payment'=>'required|numeric',
            'commission'=>'required|numeric',
            'month.*'=>'required|numeric',
            'yearly_percent.*'=>'required|numeric',
            'insurance_percent.*'=>'required|numeric',
            'gps.*'=>'required|numeric'
        ];
    }
}
