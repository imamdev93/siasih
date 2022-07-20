@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Detail Jadwal Mengajar</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Kelas</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $jadwal->kelas->romawi ?? '-'}} ({{ $jadwal->kelas->nama ?? '-'}})
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $jadwal->mapel->nama ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Hari</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $jadwal->hari ?? '-'}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn btn-sm btn-secondary" href="{{ route('jadwal.index')}}">Kembali</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('jadwal.edit', $jadwal->id)}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
