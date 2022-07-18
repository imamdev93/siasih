@extends('layouts.app')

@section('content')
<div class="row">
    @include('notification')
    <div class="col-lg-12">
        <form action="{{ route('biodata.update') }} " method="POST">
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Biodata</h5>
                </div>
                @auth('admin')
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nama" name="nama" class="form-control"
                                value="{{ old('nama', auth()->user()->nama) }}">
                            @error('nama')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('nama') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Username</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Username" name="username" class="form-control"
                                value="{{ old('username', auth()->user()->username) }}">
                            @error('username')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('username') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" placeholder="Email" name="email" class="form-control"
                                value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                            @enderror
                        </div>
                    </div>
                    @endauth
                    @auth('guru')
                    <div class="ibox-content">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Nama</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Nama" name="nama" class="form-control"
                                    value="{{ old('nama', auth()->user()->nama) }}">
                                @error('nama')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('nama') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Username" name="username" class="form-control"
                                    value="{{ old('username', auth()->user()->username) }}">
                                @error('username')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('username') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" placeholder="Email" name="email" class="form-control"
                                    value="{{ old('email', auth()->user()->email) }}">
                                @error('email')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                @enderror
                            </div>
                        </div>
                        @endauth
                        @auth('siswa')
                        <div class="ibox-content">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nama</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="Nama" name="nama" class="form-control"
                                        value="{{ old('nama', auth()->user()->nama) }}">
                                    @error('nama')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('nama') }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Tempat Lahir</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="Tempat Lahir" name="tempat_lahir" class="form-control"
                                        value="{{ old('tempat_lahir', auth()->user()->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-lg-10">
                                    <input type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" class="form-control"
                                        value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}">
                                    @error('tanggal_lahir')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Alamat</label>
                                <div class="col-lg-10">
                                    <textarea name="alamat" id="" cols="30" rows="3" class="form-control">
                                        {{ old('alamat', auth()->user()->alamat) }}
                                    </textarea>
                                    @error('alamat')
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('alamat') }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endauth
                        <div class="form-group row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <a href="{{ route('beranda') }}" class="btn btn-sm btn-secondary"
                                    type="submit">Batal</a>
                                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection
