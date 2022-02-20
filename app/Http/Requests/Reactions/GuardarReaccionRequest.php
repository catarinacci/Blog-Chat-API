<?php

namespace App\Http\Requests\Reactions;

use Illuminate\Foundation\Http\FormRequest;

class GuardarReaccionRequest extends FormRequest
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
            'note_id' => "required|exists:notes,id",
            'typereaction_id' => "required|exists:typereactions,id"
        ];
    }
}
