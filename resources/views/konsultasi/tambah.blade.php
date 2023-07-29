@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ $jenis=='akademik' ? route('konsultasi.store') : route('konsultasi.nonAkademik.store') }} " method="POST">
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tambah Konsultasi {{ucwords($jenis)}} Siswa</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Isi Konsultasi</label>
                        <div class="col-lg-10">
                            <textarea name="isi_konsultasi" id="" cols="30" rows="10" class="form-control">
                                {{ old('isi_konsultasi') }}
                            </textarea>
                            @error('isi_konsultasi')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('isi_konsultasi') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ $jenis=='akademik' ? route('konsultasi.index') : route('konsultasi.nonAkademik.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
