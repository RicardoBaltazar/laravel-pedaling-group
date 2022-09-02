<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RidesRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'start_date' => ['required', 'string'],
            'start_date_registration' => ['required', 'string'],
            'end_date_registration' => ['required', 'string'],
            'additional_information' => ['required', 'string'],
            'start_place' => ['required', 'string'],
            'participants_limit' => ['required', 'int', 'max:100'],
        ];
    }
}
