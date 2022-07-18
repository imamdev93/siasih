<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
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
        if (session()->get('role') == 'admin') {
            $rule = [
                'username' => 'required|unique:admin,username,'.auth()->user()->id,
                'email' => 'required|unique:admin,email,'.auth()->user()->id,
                'nama' => 'required'
            ];
        } elseif (session()->get('role') == 'guru') {
            $rule = [
                'username' => 'required|unique:guru,username,'.auth()->user()->id,
                'email' => 'required|unique:guru,email,'.auth()->user()->id,
                'nama' => 'required',
            ];
        } else {
            $rule = [
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
            ];
        }

        return $rule;
    }
}
