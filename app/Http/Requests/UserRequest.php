<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->user;
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min: 8',
            'role_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama User wajib diisi.',
            'name.min' => 'Isi minimal 3 karakter.',
            'name.max' => 'Isi maksimal 50 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format E-Mail tidak sesuai',
            'email.unique' => 'Email yang diinpuut sudah terdaftar',
            'password.required' => 'Kata Sandi wajib diisi',
            'password.min' => 'Isi minimal 8 karakter',
            'role_id.required' => 'Hak Akses harus dipilih'
        ];
    }
}
