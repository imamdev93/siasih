@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('wallet.update', $wallet->id) }} " method="POST">
            @method('PATCH')
            @csrf
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Edit Dompet</h5>
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
                            <input type="text" placeholder="Nama" name="name" class="form-control" value="{{ old('name', $wallet->name) }}">
                            @error('name')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Icon</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Icon" name="icon" class="form-control" value="{{ old('icon', $wallet->icon) }}">
                            @error('icon')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('icon') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Deskripsi</label>
                        <div class="col-lg-10">
                            <textarea type="text" placeholder="Deskripsi" name="description" class="form-control" value="">{{ old('description', $wallet->description) }}</textarea>
                            @error('description')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Saldo</label>
                        <div class="col-lg-10">
                            <input type="number" min="0" placeholder="Saldo" name="balance" class="form-control" value="{{ old('balance', $wallet->balance) }}">
                            @error('balance')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('balance') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tipe Dompet</label>
                        <div class="col-lg-10">
                            <select name="type" id="" class="form-control">
                                <option value="">Pilih</option>
                                <option value="REKENING" {{ old('type', $wallet->type) == 'REKENING' ? 'selected' : ''}}>REKENING</option>
                                <option value="E_WALLET" {{ old('type', $wallet->type) == 'E_WALLET' ? 'selected' : ''}}>E-WALLET</option>
                                <option value="CASH" {{ old('type', $wallet->type) == 'CASH' ? 'selected' : ''}}>CASH</option>
                            </select>
                            @error('type')
                                <span class="form-text m-b-none text-danger">{{ $errors->first('type') }}</span>
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
