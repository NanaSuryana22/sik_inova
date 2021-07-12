<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResepRequest extends FormRequest
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
        $id = $this->resep;
        return [
            'obat_id' => 'required',
            'jumlah_obat' => 'required',
            'dosis' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'obat_id.required' => 'Obat harus dipilih',
            'jumlah_obat.required' => 'Jumlah obat yang dibeli harus diisi',
            'dosis..required' => 'Berikan keterangan dosis yang dianjurkan'
        ];
    }
}
