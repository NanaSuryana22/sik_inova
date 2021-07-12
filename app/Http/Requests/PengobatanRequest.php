<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengobatanRequest extends FormRequest
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
        $id = $this->pengobatan;
        return [
            'pendaftaran_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pendaftaran_id.required' => 'Pilih No Pendaftaran'
        ];
    }
}
