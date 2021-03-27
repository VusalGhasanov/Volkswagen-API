<?php

namespace App\Http\Requests\Admin\Credit;

use Illuminate\Foundation\Http\FormRequest;

class CreditUpdateRequest extends FormRequest
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
            'initial_payment'=>'required|numeric',
            'commission'=>'required|numeric',
            'month.*'=>'required|numeric',
            'yearly_percent.*'=>'required|numeric',
            'insurance_percent.*'=>'required|numeric',
        ];
    }
}
