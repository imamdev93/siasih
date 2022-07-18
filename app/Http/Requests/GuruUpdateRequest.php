<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruUpdateRequest extends FormRequest
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
            'nama' => 'required',
            'username' => 'required|unique:guru,username,'.$this->guru->id,
            'email' => 'required|unique:guru,email,'.$this->guru->id,
            'kelas_id' => 'required',
        ];
    }
}
