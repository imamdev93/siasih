@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('nilai.update', $nilai->id) }} " method="POST">
                @method('PATCH')
                @csrf
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Edit Nilai Siswa</h5>
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
                                        <option value="{{ old('siswa_id', $nilai->siswa_id) }}"
                                            {{ old('nilai_id', $nilai->siswa_id) == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}</option>
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
                                        <option value="{{ old('mata_pelajaran_id', $nilai->mata_pelajaran_id) }}"
                                            {{ old('nilai_id', $nilai->mata_pelajaran_id) == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('mata_pelajaran_id')
                                    <span
                                        class="form-text m-b-none text-danger">{{ $errors->first('mata_pelajaran_id') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Semester</label>
                            <div class="col-lg-10">
                                <select name="semester_id" id="" class="form-control">
                                    <option value="">Pilih Semester</option>
                                    @foreach ($semester as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('semester_id', $nilai->semester_id) == $data->id ? 'selected' : '' }}>
                                            {{ $data->judul }}
                                        </option>
                                    @endforeach
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
                                    <option value="UTS"
                                        {{ old('jenis_nilai', $nilai->jenis_nilai) == 'UTS' ? 'selected' : '' }}>UTS
                                    </option>
                                    <option value="UAS"
                                        {{ old('jenis_nilai', $nilai->jenis_nilai) == 'UAS' ? 'selected' : '' }}>UAS
                                    </option>
                                </select>
                                @error('jenis_nilai')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('jenis_nilai') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Nilai</label>
                            <div class="col-lg-10">
                                <input type="number" name="nilai" min=0 max=100 class="form-control"
                                    value="{{ old('nilai', $nilai->nilai) }}">
                                @error('nilai')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('nilai') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <a href="{{ route('nilai.index') }}" class="btn btn-sm btn-secondary">Batal</a>
                                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
