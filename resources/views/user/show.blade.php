@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Detail User</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Nama</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $user->name}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Email</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $user->email}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn btn-sm btn-primary" href="{{ route('user.edit', $user->id)}}">Edit</a>
                        <a class="btn btn-sm btn-secondary" href="{{ route('user.index')}}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
