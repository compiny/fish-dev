<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDevRequest extends FormRequest
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
            'n' => 'required',
            'date' => 'required',
            'final' => 'nullable',
            'troubles' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'customer_id' => 'required',
            'type_id' => 'nullable',
            'vendor_id' => 'nullable',
            'sn' => 'nullable',
            'notofication' => 'boolean',
        ];
    }
}
