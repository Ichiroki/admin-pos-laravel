<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'image' => 'required',
            'qty' => 'required|integer',
            'discount' => 'nullable|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Kolom form ini wajib diisi',
        ];
    }
}
