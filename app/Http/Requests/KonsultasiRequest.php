<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KonsultasiRequest extends FormRequest
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
            'isi_konsultasi' => session()->get('role') == 'siswa' ? 'required|min:10' : '',
            'jawaban' => session()->get('role') == 'guru' ? 'required|min:10' : '',
        ];
    }
}
