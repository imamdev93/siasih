@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Detail Absensi Siswa</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">NISN</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $absensi->siswa->nisn ?? ''}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Nama Siswa</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $absensi->siswa->nama ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Kelas</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $absensi->siswa->kelas->nama ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Tanggal Absensi</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $absensi->tanggal ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Keterangan</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $absensi->keterangan ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn btn-sm btn-secondary" href="{{ route('absensi.index')}}">Kembali</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('absensi.edit', $absensi->id)}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
