<?php

namespace App\Http\Requests\manufacturer;

use Illuminate\Foundation\Http\FormRequest;

class StoreManufacturerRequest extends FormRequest
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
            'name' => [
                'required', 'string'
            ],
            'description' => [
                'required', 'string'
            ],
            'image' => [
                'required', 'file'
            ]
        ];
    }
}