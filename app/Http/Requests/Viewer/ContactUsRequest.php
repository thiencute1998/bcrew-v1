<?php

namespace App\Http\Requests\Viewer;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            //
            'name'=> 'required',
            'email'=> 'required|email',
            'file'=> 'max:51200' // 1MB
        ];
    }

    public function messages() {
        return [
            'name.required'=> "Name is required",
            'email.required'=> "Email is required",
            'email.email'=> 'Email is not right format',
            'file.max'=> 'File upload must be less than 50MB'
        ];
    }
}
