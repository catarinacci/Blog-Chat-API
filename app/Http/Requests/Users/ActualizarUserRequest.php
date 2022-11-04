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
            'name' => 'nullable|alpha',
            'surname' => 'nullable|alpha',
            'image_profile_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];
    }
}
