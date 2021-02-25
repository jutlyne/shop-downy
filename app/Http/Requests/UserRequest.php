<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required',
            'fname' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Ten khong duoc de trong',
            'username.min' => 'Ten toi thieu la 6 ki tu',
            'username.unique' => 'Tồn tại username',
            'password.required' => 'Mat khau khong duoc de trong',
            'fname.required' => 'Ban chua nhap vao ten cua ban'
        ];
    }
}
