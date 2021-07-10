<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $id = $this->employee;
        return [
            'user_id' => 'required',
            'id_card' => 'required|min:16|max:16',
            'alamat' => 'required|min:8|max:255',
            'wilayah_id' => 'required',
            'kota_id' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan_terakhir' => 'required',
            'photo' => 'required|min:3|max:7000'
        ];
    }

    public function messages()
    {
        return [
            'id_card.required' => 'NIK Pegawai harus diisi',
            'id_card.min' => 'NIK Pegawai harus terdiri dari 16 digit',
            'id_card.max' => 'NIK Pegawai harus terdiri dari 16 digit',
            'user_id.required' => 'User Pengguna Harus Dipilih, jika tidak ada maka buat dahulu di menu User.',
            'alamat.required' => 'Alamat pegawai wajib diisi',
            'alamat.min' => 'Input alamat minimal 8 karakter',
            'alamat.max' => 'Input alamat maksimal 255 karakter',
            'wilayah_id.required' => 'Wilayah wajib dipilih',
            'kota_id.required' => 'Kota wajib dipilih',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Dipilih',
            'pendidikan_terakhir.required' => 'Pendidikan Terakhir wajib dipilih',
            'photo.required' => 'Foto wajib diupload',
            'photo.min' => 'Ukuran Gambar Minimal 3 Kilobytes',
            'photo.max' => 'Ukuran Gambar Maksimal 7 Megabytes',
        ];
    }
}
