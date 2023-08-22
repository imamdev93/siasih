<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsensiRequest;
use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Absensi::query();

        if (session()->get('role') == 'siswa') {
            $query->where('siswa_id', auth()->user()->id);
        }

        if (session()->get('role') == 'guru') {
            $query->whereHas('siswa', function ($query) {
                $query->where('kelas_id', auth()->user()->kelas_id);
            });
        }

        $absensi = $query->get();
        return view('absensi.index', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::query();

        if (session()->get('role') == 'guru') {
            $siswa->whereHas('absensi', function ($query) {
                $query->whereDate('tanggal', date('Y-m-d'));
            })->where('kelas_id', auth()->user()->kelas_id);
        }
        $siswa = Siswa::where('kelas_id', auth()->user()->kelas_id)->whereNotIn('id', $siswa->pluck('id')->toArray())->get();
        return view('absensi.tambah', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsensiRequest $request)
    {
        DB::beginTransaction();
        try {
            Absensi::updateOrCreate($request->validated());
            DB::commit();
            return redirect()->route('absensi.create')->with('success', 'Berhasil menyimpan data');
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
    public function show(Absensi $absensi)
    {
        return view('absensi.detail', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        $siswa = Siswa::query();

        if (session()->get('role') == 'guru') {
            $siswa->where('kelas_id', auth()->user()->kelas_id);
        }

        $siswa = $siswa->get();
        return view('absensi.edit', compact('siswa', 'absensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbsensiRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            Absensi::updateOrCreate(['id' => $id], $request->validated());
            DB::commit();
            return redirect()->route('absensi.index')->with('success', 'Berhasil merubah data');
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
    public function destroy(Absensi $absensi)
    {
        DB::beginTransaction();
        try {
            $absensi->delete();
            DB::commit();
            return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('absensi.index')->with('error', 'Absensi gagal dihapus');
        }
    }

    public function storeAll()
    {
        $exist = Siswa::whereHas('absensi', function ($query) {
            $query->whereDate('tanggal', date('Y-m-d'));
        })->where('kelas_id', auth()->user()->kelas_id)->pluck('id')->toArray();

        $siswa = Siswa::whereNotIn('id', $exist)->where('kelas_id', auth()->user()->kelas_id)->get();


        try {
            foreach ($siswa as $data) {
                Absensi::create([
                    'siswa_id' => $data->id,
                    'tanggal' => date('Y-m-d'),
                    'keterangan' => 'masuk',
                ]);
            }
            DB::commit();
            return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('absensi.index')->with('error', 'Absensi gagal ditambahkan');
        }
    }
}
