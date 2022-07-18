@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Detail Siswa</h5>
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
                        {{ $siswa->nisn ?? ''}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Nama Siswa</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $siswa->nama}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Username</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $siswa->username}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Email</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $siswa->email}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Kelas</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $siswa->kelas->nama ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Tempat Lahir</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $siswa->tempat_lahir ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $siswa->tanggal_lahir ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Alamat</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {!! $siswa->alamat ?? '-' !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn btn-sm btn-secondary" href="{{ route('siswa.index')}}">Kembali</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('siswa.edit', $siswa->id)}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
