@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('absensi.update', $absensi->id) }} " method="POST">
            @method('PATCH')
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Edit Absensi Siswa</h5>
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
                                    @foreach ($siswa as $value)
                                    <option value="{{ $value->id }}" {{ old('siswa_id', $absensi->siswa_id) == $value->id ? 'selected' : ''}}>{{ $value->nama }}</option>
                                @endforeach
                            </select>
                            @error('siswa_id')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('siswa_id') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tanggal Absensi</label>
                        <div class="col-lg-10">
                            <input type="date" placeholder="Tanggal Absensi" name="tanggal" class="form-control" value="{{ old('tanggal', $absensi->tanggal) }}">
                            @error('tanggal')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('tanggal') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Keterangan</label>
                        <div class="col-lg-10">
                            <select name="keterangan" id="" class="form-control">
                                <option value="">Pilih Keterangan</option>
                                <option value="masuk" {{ old('keterangan', $absensi->keterangan) == 'masuk' ? 'selected' : ''}}>Masuk</option>
                                <option value="izin" {{ old('keterangan', $absensi->keterangan) == 'izin' ? 'selected' : ''}}>Izin</option>
                                <option value="sakit" {{ old('keterangan', $absensi->keterangan) == 'sakit' ? 'selected' : ''}}>Sakit</option>
                                <option value="alpa" {{ old('keterangan', $absensi->keterangan) == 'alpa' ? 'selected' : ''}}>Alpa</option>
                            </select>
                            @error('keterangan')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('keterangan') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('absensi.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
