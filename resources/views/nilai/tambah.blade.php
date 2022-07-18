@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('nilai.store') }} " method="POST">
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tambah Nilai Siswa</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama Siswa</label>
                        <div class="col-lg-10">
                            <select name="siswa_id" id="" class="select2_demo_3 form-control">
                                <option value="">Pilih Siswa</option>
                                @foreach ($siswa as $data)
                                    <option value="{{ old('siswa_id', $data->id) }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('siswa_id')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('siswa_id') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-lg-10">
                            <select name="mata_pelajaran_id" id="" class="select2_demo_3 form-control">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $data)
                                    <option value="{{ old('mata_pelajaran_id', $data->id) }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('mata_pelajaran_id')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('mata_pelajaran_id') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Semester</label>
                        <div class="col-lg-10">
                            <select name="semester" id="" class="form-control">
                                <option value="">Pilih Semester</option>
                                <option value="GANJIL">GANJIL</option>
                                <option value="GENAP">GENAP</option>
                            </select>
                            @error('semester')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('semester') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Jenis Nilai</label>
                        <div class="col-lg-10">
                            <select name="jenis_nilai" id="" class="form-control">
                                <option value="">Pilih Jenis Nilai</option>
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                            </select>
                            @error('jenis_nilai')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('jenis_nilai') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nilai</label>
                        <div class="col-lg-10">
                            <input type="number" name="nilai" min=0 max=100 class="form-control" value="{{ old('nilai') }}"> 
                            @error('nilai')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('nilai') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('nilai.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
