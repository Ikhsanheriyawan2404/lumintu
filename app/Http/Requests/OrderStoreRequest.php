<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'qty' => 'required|array',
            'qty.*' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Produk harus diisi',
            'product_id.array' => 'Produk harus berupa array',
            'product_id.*.required' => 'Produk harus diisi',
            'product_id.*.exists' => 'Produk tidak ditemukan',
            'qty.required' => 'Kuantitas harus diisi',
            'qty.array' => 'Kuantitas harus berupa array',
            'qty.*.required' => 'Kuantitas harus diisi',
            'qty.*.numeric' => 'Kuantitas harus berupa angka',
        ];
    }
}
