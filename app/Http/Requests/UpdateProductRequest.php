<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:150|min:2',
            'category' => 'required|string|max:25|min:1',
            'description' => 'required|string|max:255|min:3',
            'price' => 'required|integer',
            'image' => 'required',
            'qty' => 'required|integer',
            'discount' => 'nullable|integer'
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Kolom form ini wajib diisi',
            'name.string' => 'Kolom ini hanya menerima huruf saja',
            'name.max' => 'Kolom ini maksimal 150 huruf',
            'name.min' => 'Kolom ini minimal 2 huruf',
            'category.required' => 'Kolom form ini wajib diisi',
            'category.string' => 'Kolom ini hanya menerima huruf saja',
            'category.max' => 'Kolom ini maksimal 25 huruf',
            'category.min' => 'Kolom ini minimal 1 huruf',
            'description.required' => 'Kolom form ini wajib diisi',
            'description.string' => 'Kolom ini hanya menerima huruf saja',
            'description.max' => 'Kolom ini maksimal 255 huruf',
            'description.min' => 'Kolom ini minimal 3 huruf',
            'price.required' => 'Kolom form ini wajib diisi',
            'price.integer' => 'Kolom ini hanya menerima angka saja',
            'image.required' => 'Kolom form ini wajib diisi',
            'qty.required' => 'Kolom form ini wajib diisi',
            'qty.integer' => 'Kolom form ini hanya menerima angka saja',
            'discount.integer' => 'Kolom form ini hanya menerima angka saja'
        ];
    }
}
