<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role_id' => 'required',
            'username' => 'required | unique:users | min:3 | max:50',
            'firstname' => 'required | min:3 | max:50',
            'lastname' => 'required | min:3 | max:50',
            'email' => 'required | unique:mangas',
            'password' => 'required | confirmed | min:3',
            'gender' => 'required',
        ];
    }
}
