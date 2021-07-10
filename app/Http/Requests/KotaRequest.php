<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KotaRequest extends FormRequest
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
        $id = $this->kota;
        return [
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'wilayah_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Kota wajib diisi.',
            'name.min' => 'Isi minimal 5 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Isi minimal 5 karakter.',
            'wilayah_id.required' => 'Wilayah wajib dipilih.',
        ];
    }
}
