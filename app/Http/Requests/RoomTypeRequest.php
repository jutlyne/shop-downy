<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
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
            'tentruyen' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'tentruyen.required' => 'Ten khong duoc de trong',
            'tentruyen.min' => 'Ten toi thieu la 2 ki tu'
        ];
    }
}
