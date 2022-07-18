@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('guru.update', $guru->id) }} " method="POST">
            @method('PATCH')
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Edit Guru</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama Guru</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nama Guru" name="nama" class="form-control" value="{{ old('nama', $guru->nama) }}">
                            @error('nama')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('nama') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Username</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Username" name="username" class="form-control" value="{{ old('username', $guru->username) }}">
                            @error('username')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('username') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" placeholder="Email" name="email" class="form-control" value="{{ old('email', $guru->email) }}">
                            @error('email')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Kelas</label>
                        <div class="col-lg-10">
                            <select name="kelas_id" id="" class="form-control">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $value)
                                    <option value="{{ $value->id }}" {{ old('kelas_id', $guru->kelas_id) == $value->id ? 'selected' : ''}}>{{ $value->romawi }} ({{ $value->nama }})</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('kelas_id') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('guru.index') }}" class="btn btn-sm btn-secondary" >Batal</a>
                            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
