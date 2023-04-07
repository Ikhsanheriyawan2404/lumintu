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
            'customer_id' => 'required|exists:users,id',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'qty' => 'required|array',
            'qty.*' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'Customer harus diisi',
            'customer_id.exists' => 'Customer tidak ditemukan',
            'product_id.required' => 'Produk harus diisi',
            'product_id.array' => 'Produk harus berupa array',
            'product_id.*.required' => 'Produk harus diisi',
            'product_id.*.exists' => 'Produk tidak ditemukan',
            'qty.required' => 'Jumlah harus diisi',
            'qty.array' => 'Jumlah harus berupa array',
            'qty.*.required' => 'Jumlah harus diisi',
            'qty.*.numeric' => 'Jumlah harus berupa angka',
        ];
    }
}
