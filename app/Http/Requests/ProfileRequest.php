<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            "name" => "required|max:50",
            "email" => "required|email|max:100",
            "no_hp" => "required|max:30",
            "address" => "max:100",
            "image" => "file|max:1024"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama pengguna harus diisi!',
            'name.max' => 'panjang tidak boleh lebih dari 50 karakter!',
            'email.required' => 'email harus diisi!',
            'email.max' => 'panjang tidak boleh lebih dari 100 karakter!',
            'no_hp.required' => 'nomor telepon harus diisi!',
            'no_hp.max' => 'panjang tidak boleh lebih dari 30 karakter!',
        ];
    }
}
 