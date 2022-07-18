<?php

namespace App\Http\Requests;

use App\Enums\KeteranganEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class AbsensiRequest extends FormRequest
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
            'tanggal' => 'required|date',
            'keterangan' => [
                'required',
                new EnumRule(KeteranganEnum::class)
            ],
        ];
    }
}
