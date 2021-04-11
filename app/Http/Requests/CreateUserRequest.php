<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'      => 'required',
            'password'  => 'required|min:5',
            'email'     => 'required|email|unique:users',
        ];
    }

    public function message(){
        return[
            'name.required'         => 'nama wajib di isi............',
            'password.required'     => 'password wajib di isi ........',
            'password.min'          => 'password terlalu pendek.......',
            'email.required'        => 'email wajib di isi....',
            'email.email'           => 'email tidak valid.......',
            'email.unique'          => 'email sudah terdaftar......'
        ]
    }
}
