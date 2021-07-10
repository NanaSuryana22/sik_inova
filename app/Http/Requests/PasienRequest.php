<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
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
        $id = $this->pasien;
        return [
            'nama' => 'required|min:3|max:150',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:3|max:50',
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required|min:10|max:12',
            'alamat' => 'required|min:5|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Pasien harus diisi',
            'nama.min' => 'Nama pasien minimal 3 haruf',
            'nama.max' => 'Nama pasien maksimal 150 huruf',
            'nik.required' => 'NIK Pasien harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tempat_lahir.min' => 'Tempat lahir minimal 3 huruf',
            'tempat_lahir.max' => 'Tempat lahir maksimal 50 huruf',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'no_handphone.required' => 'No Handphone harus diisi',
            'no_handphone.min' => 'No Handphone minimal 10 angka',
            'no_handphone.max' => 'No Handphone maksimal 12 angka',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Alamat minimal 5 huruf',
            'alamat.max' => 'Alamat maksimal 255 huruf'
        ];
    }
}
