@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ $jenis=='akademik' ? route('konsultasi.storeFeedback', $konsultasi->id) : route('konsultasi.nonAkademik.storeFeedback', $konsultasi->id) }} " method="POST">
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Feedback Konsultasi {{ucwords($jenis)}} Siswa</h5>
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
                            {{ $konsultasi->isi_konsultasi ?? '-' }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Jawaban</label>
                        <div class="col-lg-10">
                            <textarea name="jawaban" id="" cols="30" rows="10" class="form-control">
                                {{ old('jawaban') }}
                            </textarea>
                            @error('jawaban')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('jawaban') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('konsultasi.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
