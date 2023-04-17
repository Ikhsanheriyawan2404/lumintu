<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'harga' => 'required',
            'date' => 'sometimes',
            'description' => 'sometimes',
            'qty' => 'required|min:1'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'harga.required' => 'Harga harus diisi',
            'qty.min' => 'Kwantitas minimal 1',
        ];
    }
}
