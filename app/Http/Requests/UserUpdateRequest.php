<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_name' => 'nullable|string|max:32',
            'bio' => 'nullable|string|max:128',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'new_password' => 'nullable|string|min:6|different:password',
        ];
    }
}
