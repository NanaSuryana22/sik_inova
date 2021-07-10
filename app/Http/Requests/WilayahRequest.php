<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WilayahRequest extends FormRequest
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
        $id = $this->wilayah;
        return [
            'name' => 'required|min:5',
            'description' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Provinsi wajib diisi.',
            'name.min' => 'Isi minimal 5 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Isi minimal 5 karakter.',
        ];
    }
}
