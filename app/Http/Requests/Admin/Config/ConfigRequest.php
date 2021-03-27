<?php

namespace App\Http\Requests\Admin\Config;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'number_1'=>'required',
            'number_2'=>'required',
            'number_3'=>'required',
            'email_1'=>'required|email',
            'email_2'=>'required|email',
            'address'=>'required',
            'facebook'=>'required',
            'instagram'=>'required',
            'youtube'=>'required',
            'twitter'=>'nullable',

        ];
    }
}
