@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('semester.store') }} " method="POST">
                @csrf
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Tambah Semester</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Judul</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Judul" name="judul" class="form-control"
                                    value="{{ old('judul') }}">
                                @error('judul')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('judul') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-lg-10">
                                <input type="date" placeholder="Tanggal Lahir" name="tanggal_mulai" class="form-control"
                                    value="{{ old('tanggal_mulai') }}">
                                @error('tanggal_mulai')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('tanggal_mulai') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Tanggal Selesai</label>
                            <div class="col-lg-10">
                                <input type="date" placeholder="Tanggal Lahir" name="tanggal_selesai"
                                    class="form-control" value="{{ old('tanggal_selesai') }}">
                                @error('tanggal_selesai')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('tanggal_selesai') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <a href="{{ route('semester.index') }}" class="btn btn-sm btn-secondary">Batal</a>
                                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
