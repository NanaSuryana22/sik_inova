<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
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
        $id = $this->pendaftaran;
        return [
            'pasien_id' => 'required',
            'tanggal_daftar' => 'required',
            'keluhan_pasien' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pasien_id.required' => 'Pasien harus dipilih.',
            'tanggal_daftar.required' => 'Tanggal daftar harus diisi.',
            'keluhan_pasien.required' => 'Keluhan pasien harus diisi.'
        ];
    }
}
