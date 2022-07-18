<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaStoreRequest extends FormRequest
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
            'nisn' => 'required|numeric|unique:siswa,nisn',
            'nama' => 'required',
            'username' => 'required|unique:siswa,username',
            'email' => 'required|unique:siswa,email',
            'password' => 'required|min:6|confirmed',
            'kelas_id' => 'required',
            'tempat_lahir' => 'nullable|min:3',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|min:6',
        ];
    }
}
