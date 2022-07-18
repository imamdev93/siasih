@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('siswa.store') }} " method="POST">
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tambah Siswa</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">NISN</label>
                        <div class="col-lg-10">
                            <input type="number" min="0" placeholder="NISN" name="nisn" class="form-control" value="{{ old('nisn') }}">
                            @error('nisn')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('nisn') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama Siswa</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nama Siswa" name="nama" class="form-control" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('nama') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Username</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Username" name="username" class="form-control" value="{{ old('username') }}">
                            @error('username')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('username') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" placeholder="Email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Password" name="password" class="form-control" value="{{ old('password') }}">
                            @error('password')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('password') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label"> Konfirmasi Password</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Konfirmasi Password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Kelas</label>
                        <div class="col-lg-10">
                            <select name="kelas_id" id="" class="form-control">
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
                        <label class="col-lg-2 col-form-label">Tempat Lahir</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Tempat Lahir" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('tempat_lahir') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-lg-10">
                            <input type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Alamat</label>
                        <div class="col-lg-10">
                            <textarea name="alamat" id="" cols="30" rows="3" class="form-control">
                                {!! old('alamat') !!}
                            </textarea>
                            @error('alamat')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('alamat') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
