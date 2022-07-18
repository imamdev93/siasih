@extends('layouts.app')

@section('content')
<div class="row">
    @include('notification')
    <div class="col-lg-12">
        <form action="{{ route('password.update') }} " method="POST">
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Ubah Password</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Password Lama</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Password Lama" name="old_password" class="form-control"
                                value="">
                            @error('old_password')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('old_password') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Password Baru</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Password Baru" name="password" class="form-control"
                                value="">
                            @error('password')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('password') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Konfirmasi Kata Sandi Baru</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Konfirmasi Password Baru" name="password_confirmation" class="form-control"
                                value="">
                            @error('password_confirmation')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('beranda') }}" class="btn btn-sm btn-secondary" type="submit">Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
