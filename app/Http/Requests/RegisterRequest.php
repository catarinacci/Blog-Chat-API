<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterRequest extends FormRequest
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
            'name' => 'regex:/^[\pL\s\-]+$/u',
            'surname' => 'regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users,email',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
