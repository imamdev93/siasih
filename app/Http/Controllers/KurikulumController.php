<?php

namespace App\Http\Controllers;

use App\Http\Requests\KurikulumStoreRequest;
use App\Http\Requests\KurikulumUpdateRequest;
use App\Models\Kurikulum;
use Illuminate\Support\Facades\DB;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kurikulum'] = Kurikulum::get();
        return view('kurikulum.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kurikulum.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KurikulumStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            Kurikulum::create($request->validated());
            DB::commit();
            return redirect()->route('kurikulum.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function show(Kurikulum $kurikulum)
    {
        return view('kurikulum.detail', compact('kurikulum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurikulum $kurikulum)
    {
        return view('kurikulum.edit', compact('kurikulum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function update(KurikulumUpdateRequest $request, Kurikulum $kurikulum)
    {
        DB::beginTransaction();
        try {
            $kurikulum->update($request->validated());
            DB::commit();
            return redirect()->route('kurikulum.index')->with('success', 'Berhasil merubah data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal merubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kurikulum $kurikulum)
    {
        //
    }
}
