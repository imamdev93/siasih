@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Detail Nilai Siswa</h5>
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
                        {{ $nilai->siswa->nisn ?? ''}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Nama Siswa</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $nilai->siswa->nama ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Kelas</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $nilai->siswa->kelas->nama ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $nilai->mapel->nama ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Semester</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $nilai->semester ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Jenis Nilai</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $nilai->jenis_nilai ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Nilai</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $nilai->nilai ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn btn-sm btn-secondary" href="{{ route('nilai.index')}}">Kembali</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('nilai.edit', $nilai->id)}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
