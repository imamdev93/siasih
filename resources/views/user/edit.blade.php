@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('user.update', $user->id) }} " method="POST">
            @method('PATCH')
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Edit User</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nama" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" placeholder="Email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Password" name="password" class="form-control" value="">
                            @error('password')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('password') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Konfirmasi Password" name="password_confirmation" class="form-control" value="">
                            @error('password_confirmation')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
