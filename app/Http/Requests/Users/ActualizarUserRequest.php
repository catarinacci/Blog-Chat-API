<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarUserRequest extends FormRequest
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
            'name' => 'regex:/^[\pL\s\-]+$/u|max:30|required',
            'surname' => 'nullable|regex:/^[\pL\s\-]+$/u|max:30',
            'nickname' => 'nullable|regex:/^[\pL\s\-]+$/u|max:30',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
