<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonsultasiRequest;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function index()
    {
        $query = Konsultasi::where('kelas_id', auth()->user()->kelas_id);

        if (session()->get('role') == 'siswa') {
            $konsultasi = $query->where('siswa_id', auth()->user()->id);
        }

        $konsultasi = $query->get();

        return view('konsultasi.index', compact('konsultasi'));
    }

    public function create()
    {
        return view('konsultasi.tambah');
    }

    public function store(KonsultasiRequest $request)
    {
        DB::beginTransaction();
        try {
            Konsultasi::create($request->validated() + [
                'siswa_id' => auth()->user()->id,
                'kelas_id' => auth()->user()->kelas_id,
            ]);
            DB::commit();
            return redirect()->route('konsultasi.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function feedback($id)
    {
        $konsultasi = Konsultasi::find($id);
        return view('konsultasi.feedback', compact('konsultasi'));
    }


    public function storeFeedback(KonsultasiRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $konsultasi = Konsultasi::find($id);
            $konsultasi->update($request->validated());
            DB::commit();
            return redirect()->route('konsultasi.index')->with('success', 'Berhasil merubah data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }
}
