<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaUpdateRequest extends FormRequest
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
            'nisn' => 'required|numeric|unique:siswa,nisn,' . $this->siswa->id,
            'nama' => 'required',
            'username' => 'required|unique:siswa,username,' . $this->siswa->id,
            'email' => 'required|unique:siswa,email,' . $this->siswa->id,
            'kelas_id' => 'required',
            'tempat_lahir' => 'nullable|min:3',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|min:6',
        ];
    }
}
