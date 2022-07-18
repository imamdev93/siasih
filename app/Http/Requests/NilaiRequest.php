<?php

namespace App\Http\Requests;

use App\Enums\JenisNilaiEnum;
use App\Enums\SemesterEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class NilaiRequest extends FormRequest
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
            'siswa_id' => 'required|exists:siswa,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'semester' => [
                'required',
                new EnumRule(SemesterEnum::class)
            ],
            'jenis_nilai' => [
                'required',
                new EnumRule(JenisNilaiEnum::class)
            ],
            'nilai' => 'required|numeric|min:0|max:100'
        ];
    }
}
