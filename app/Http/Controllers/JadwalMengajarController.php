<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalRequest;
use App\Models\Kelas;
use App\Models\KelasMapel;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalMengajarController extends Controller
{
    public function index()
    {
        $query = KelasMapel::query();

        if (session()->get('role') != 'admin') {
            $query->where('kelas_id', auth()->user()->kelas_id);
        }

        $jadwal = $query->get();

        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $query = Kelas::query();
        $mapel = MataPelajaran::all();

        if (session()->get('role') != 'admin') {
            $query->where('id', auth()->user()->kelas_id);
        }

        $kelas = $query->get();

        return view('jadwal.tambah', compact('kelas', 'mapel'));
    }

    public function store(JadwalRequest $request)
    {
        DB::beginTransaction();
        try {
            KelasMapel::updateOrCreate(
                [
                    'mata_pelajaran_id' => $request->mata_pelajaran_id,
                    'kelas_id' => $request->kelas_id
                ],
                $request->validated()
            );
            DB::commit();
            return redirect()->route('jadwal.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function show($id)
    {
        $jadwal = KelasMapel::find($id);
        return view('jadwal.detail', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = KelasMapel::find($id);
        $kelas = Kelas::get();
        $mapel = MataPelajaran::get();
        return view('jadwal.edit', compact('jadwal', 'kelas', 'mapel'));
    }

    public function update(JadwalRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $jadwal = KelasMapel::find($id);
            $jadwal->update($request->validated());
            DB::commit();
            return redirect()->route('jadwal.index')->with('success', 'Berhasil merubah data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal merubah data');
        }
    }
}
