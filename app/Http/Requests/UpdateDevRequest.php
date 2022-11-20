<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDevRequest extends FormRequest
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
            'id' => ['required', 'numeric'],
            'n' => 'nullable',
            'date' => ['required', 'date'],
            'final' => 'nullable',
            'sn' => 'nullable',
            'troubles_text' => 'nullable',
            'notification' => 'nullable',
            'customer.id' => ['required', 'numeric'],
            'type.id' => ['required', 'numeric'],
            'vendor.id' => ['required', 'numeric'],
            'bundles.*' => 'nullable',
        ];
    }
}
