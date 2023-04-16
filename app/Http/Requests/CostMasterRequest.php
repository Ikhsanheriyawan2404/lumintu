<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostMasterRequest extends FormRequest
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
            'name' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama jenis pengeluaran harus diisi',
            'name.max' => 'Nama jenis pengeluaran tidak boleh lebih dari 255 karakter',
        ];
    }
}
