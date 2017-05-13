<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class UserRequest extends Request
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
            'role_id' => 'required',
            'username' => 'required | min:3 | max:50 | unique:users',
            'firstname' => 'required | min:3 | max:50',
            'lastname' => 'required | min:3 | max:50',
            'email' => 'required | unique:users',
            'password' => 'required | confirmed | min:3',
            'gender' => 'required',
        ];
    }
}
