@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Detail Semester</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Judul</label>
                        <div class="col-lg-10" style="margin-top: 8px">
                            {{ $semester->judul ?? '' }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-lg-10" style="margin-top: 8px">
                            {{ $semester->tanggal_mulai }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-lg-10" style="margin-top: 8px">
                            {{ $semester->tanggal_selesai }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a class="btn btn-sm btn-secondary" href="{{ route('semester.index') }}">Kembali</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('semester.edit', $semester->id) }}">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
