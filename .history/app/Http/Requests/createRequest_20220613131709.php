<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
                'name'=>['required'],
                'file'=>['required','image','size:value'],
                'hobby'=>['required'],
                'age'=>['required'],
                'telp'=>['required'],
                'address'=>['required'],
                'job'=>['required']
        ];
    }
}
