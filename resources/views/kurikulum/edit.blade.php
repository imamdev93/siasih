@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('kurikulum.update', $kurikulum->id) }} " method="POST">
            @method('PATCH')
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Edit Kurikulum</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama Kurikulum</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nama Kurikulum" name="nama" class="form-control" value="{{ old('nama', $kurikulum->nama) }}">
                            @error('nama')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('nama') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tahun</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Tahun" name="tahun" class="form-control" value="{{ old('tahun', $kurikulum->tahun) }}">
                            @error('tahun')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('tahun') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('kurikulum.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
