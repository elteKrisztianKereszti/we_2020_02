<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackFormRequest extends FormRequest
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
            'name'      => 'required',
            'color'     => 'required|regex:/^#[0-9a-z]{6}$/',
            'filters'   => 'nullable|array',
        ];
    }
}
