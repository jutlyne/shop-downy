<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Ten khong duoc de trong',
            'fullname.min' => 'Ten toi thieu la 3 ki tu',
            'email.required' => 'Email khong duoc de trong',
            'email.email' => 'Khong dung dinh dang email',
            'subject.required' => 'Tieu de khong duoc de trong',
            'content.required' => 'Noi dung khong duoc de trong'
        ];
    }
}
