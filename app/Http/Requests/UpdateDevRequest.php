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
            'dev.n' => 'required',
            'dev.date' => 'required',
            'dev.final' => 'nullable',
            'dev.troubles_text' => 'nullable',
            'dev.address' => 'nullable',
            'dev.phone' => 'nullable',
            'dev.customer_id' => 'required',
            'dev.type_id' => 'nullable',
            'dev.vendor_id' => 'nullable',
            'dev.sn' => 'nullable',
            'bundles.*' => 'nullable',
            'states.*' => 'nullable',
        ];
    }
}
