<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:150|min:1',
            'email' => 'required|string|email:spoof,rfc,|max:150|min:10',
            'password' => 'required|string|min:8|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Kolom ini harus diisi',
            'name.string' => 'Kolom ini harus menggabungkan angka dan huruf',
            'name.max' => 'Kolom ini tidak boleh lebih dari 150 karakter',
            'name.min' => 'Kolom ini tidak boleh kurang dari 1 karakter',
            'email.required' => 'Kolom ini harus diisi',
            'email.string' => 'Kolom ini harus menggabungkan angka dan huruf',
            'email.email' => 'Kolom ini harus menggunakan email yang valid',
            'email.max' => 'Kolom ini tidak boleh lebih dari 150 karakter',
            'email.min' => 'Kolom ini tidak boleh kurang dari 10 karakter',
            'password.required' => 'Kolom ini harus diisi',
            'password.string' => 'Kolom ini harus menggabungkan angka dan huruf',
            'password.max' => 'Kolom ini tidak boleh lebih dari 255 karakter',
            'password.min' => 'Kolom ini tidak boleh kurang dari 8 karakter',
        ];
    }
}
