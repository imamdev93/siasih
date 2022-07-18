<?php

namespace App\Http\Controllers;

use App\Http\Requests\BiodataRequest;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    use UserTrait;

    public function show()
    {
        $biodata = $this->getUser();
        return view('biodata', compact('biodata'));
    }

    public function update(BiodataRequest $request)
    {
        $user = $this->getUser();
        DB::beginTransaction();
        try {
            $user->update($request->validated());
            DB::commit();
            return redirect()->route('biodata.show')->with('success', 'Biodata berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('biodata.show')->with('error', 'Biodata gagal diubah');
        }
    }
}
