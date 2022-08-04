@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('jadwal.store') }} " method="POST">
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tambah Jadwal Mengajar</h5>
                    
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Kelas</label>
                        <div class="col-lg-10">
                            <select name="kelas_id" id="" class="select2_demo_3 form-control">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $value)
                                    <option value="{{ $value->id }}" {{ old('kelas_id') == $value->id ? 'selected' : ''}}>{{ $value->romawi }} ({{ $value->nama }})</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('kelas_id') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-lg-10">
                            <select name="mata_pelajaran_id" id="" class="select2_demo_3 form-control">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($mapel as $value)
                                    <option value="{{ $value->id }}" {{ old('mata_pelajaran_id') == $value->id ? 'selected' : ''}}>{{ $value->nama }}</option>
                                @endforeach
                            </select>
                            @error('mata_pelajaran_id')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('mata_pelajaran_id') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Hari</label>
                        <div class="col-lg-10">
                            <select name="hari" id="" class="form-control">
                                <option value="">Pilih Hari</option>
                                <option value="senin" {{ old('hari') == 'senin' ? 'selected' : ''}}>Senin</option>
                                <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : ''}}>Selasa</option>
                                <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : ''}}>Rabu</option>
                                <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : ''}}>Kamis</option>
                                <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : ''}}>Jumat</option>
                                <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : ''}}>Sabtu</option>
                            </select>
                            @error('hari')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('hari') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('jadwal.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
