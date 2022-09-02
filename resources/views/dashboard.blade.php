@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Anda Login sebagai <b>{{ session()->get('role') == 'admin' && auth()->user()->is_kepsek ? 'Kepala Sekolah' : session()->get('role')  }}</b>

        </div>
        <h2>Beranda</h2>
        <h3>
            Halo, <b>{{ auth()->user()->nama }}</b> !
        </h3>
        <h5>Selamat Datang di Sistem Informasi Akademik SDN Sri Asih</h5>
        @if(session()->get('role') == 'siswa')
        <p>
            <table>
                <tr>
                    <td width="30%">NISN</td>
                    <td width="10%">:</td>
                    <td>{{ auth()->user()->nisn }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ auth()->user()->nama }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>{{ auth()->user()->kelas->romawi ?? '-' }} ({{ auth()->user()->kelas->nama ?? '-' }})</td>
                </tr>
            </table>
        </p>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Informasi Sekolah </h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group row mb-1">
                            <label class="col-lg-2 col-form-label">Nama Sekolah</label>
                            <div class="col-lg-4 mt-2">
                                : SD Negeri Sri Asih
                            </div>
                            <label class="col-lg-2 col-form-label">NPSN</label>
                            <div class="col-lg-4 mt-2">
                                : 20233271
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-lg-2 col-form-label">Jenjang Pendidikan</label>
                            <div class="col-lg-4 mt-2">
                                : SD
                            </div>
                            <label class="col-lg-2 col-form-label">Status Sekolah</label>
                            <div class="col-lg-4 mt-2">
                                : Negeri
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-lg-2 col-form-label">Alamat Sekolah</label>
                            <div class="col-lg-4 mt-2">
                                : Babakan Sawah RT 18/07
                            </div>
                            <label class="col-lg-2 col-form-label">Kelurahan</label>
                            <div class="col-lg-4 mt-2">
                                : Cidahu
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-lg-2 col-form-label">Kecamatan</label>
                            <div class="col-lg-4 mt-2">
                                : Pagaden Barat
                            </div>
                            <label class="col-lg-2 col-form-label">Kabupaten/Kota</label>
                            <div class="col-lg-4 mt-2">
                                : Kab. Subang
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-lg-2 col-form-label">Provinsi</label>
                            <div class="col-lg-4 mt-2">
                                : Jawa Barat
                            </div>
                            <label class="col-lg-2 col-form-label">Negara</label>
                            <div class="col-lg-4 mt-2">
                                : Indonesia
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
