<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as RulesPassword;

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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:30|required',
            'surname' => 'nullable|regex:/^[\pL\s\-]+$/u|max:30',
            'nickname' => 'nullable|regex:/^[\pL\s\-]+$/u|max:30',
            //'email' => 'required|email:rfc,dns',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'password' => ['required', 'confirmed', RulesPassword::defaults()],
            'instagram' => 'nullable|regex:/^[\pL\s\-]+$/u|max:50',
            'facebook' => 'nullable|regex:/^[\pL\s\-]+$/u|max:50',
            'youtube' => 'nullable|regex:/^[\pL\s\-]+$/u|max:50',
            'country_id' => 'required|exists:countries,id',

        ];
    }
}
