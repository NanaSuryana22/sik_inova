<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TindakanRequest extends FormRequest
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
        $id = $this->tindakan;
        return [
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'harga' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 5 huruf',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka'
        ];
    }
}
