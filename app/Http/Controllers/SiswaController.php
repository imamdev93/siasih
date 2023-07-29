<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaStoreRequest;
use App\Http\Requests\SiswaUpdateRequest;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Semester;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['siswa'] = Siswa::get();
        return view('siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::get();
        return view("siswa.tambah", compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            Siswa::create($request->validated());
            DB::commit();
            return redirect()->route('siswa.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return view("siswa.detail", compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::get();
        return view("siswa.edit", compact('kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaUpdateRequest $request, Siswa $siswa)
    {
        DB::beginTransaction();
        try {
            $siswa->update($request->validated());
            DB::commit();
            return redirect()->route('siswa.index')->with('success', 'Berhasil merubah data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal merubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }

    public function grafik()
    {
        $semester = Semester::where('tanggal_mulai', '<=', date('Y-m-d'))->where('tanggal_selesai', '>=', date('Y-m-d'))->first();
        $jenis = ['UTS', 'UAS'];
        $mapel = MataPelajaran::get();
        $values = [];
        foreach ($mapel as $mpl) {
            foreach ($jenis as $key  => $value) {
                $siswa[$key] = Nilai::where('mata_pelajaran_id', $mpl->id)->where('semester_id', $semester?->id)->where('jenis_nilai', $value)->first()?->nilai;
            }
            array_push($values, array('name' => $mpl->nama, 'data' => $siswa));
        }

        $data['labels'] = $jenis;
        $data['values'] = $values;

        return view('grafik', $data);
    }
}
