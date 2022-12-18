<?php

namespace App\Http\Controllers;

use App\Http\Requests\NilaiRequest;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Semester;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Nilai::query();

        if (session()->get('role') == 'siswa' || session()->get('role') == 'guru') {
            $query->whereHas('siswa', function ($query) {
                $query->where('kelas_id', auth()->user()->kelas_id);
            });
        }

        $nilai = $query->get();
        return view('nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = MataPelajaran::get();
        $semester = Semester::latest()->get();
        $siswa = Siswa::query();
        if (session()->get('role') == 'guru') {
            $siswa->where('kelas_id', auth()->user()->kelas_id);
        }

        $siswa = $siswa->get();

        return view('nilai.tambah', compact('mapel', 'siswa', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaiRequest $request)
    {
        DB::beginTransaction();
        try {
            Nilai::updateOrCreate($request->validated());
            DB::commit();
            return redirect()->route('nilai.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        return view('nilai.detail', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $mapel = MataPelajaran::get();
        $siswa = Siswa::query();
        $semester = Semester::latest()->get();

        if (session()->get('role') == 'guru') {
            $siswa->where('kelas_id', auth()->user()->kelas_id);
        }

        $siswa = $siswa->get();

        return view('nilai.edit', compact('mapel', 'siswa', 'nilai', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NilaiRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            Nilai::updateOrCreate(['id' => $id], $request->validated());
            DB::commit();
            return redirect()->route('nilai.index')->with('success', 'Berhasil merubah data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal merubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        DB::beginTransaction();
        try {
            $nilai->delete();
            DB::commit();
            return redirect()->route('nilai.index')->with('success', 'nilai berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('nilai.index')->with('error', 'nilai gagal dihapus');
        }
    }
}
