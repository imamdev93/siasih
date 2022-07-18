@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Detail Transaksi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Dompet</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $transaction->wallet?->name}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Jumlah</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ number_format($transaction->amount,0,'.','.')}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Catatan</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $transaction->note}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Tipe</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                       <span class="badge badge-{{$transaction->type == 'pemasukan' ? 'success' : 'danger' }}"></span> {{ $transaction->type}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Kategori Transaksi</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        <span class="badge badge-info">{{ $transaction->categories->first()?->name}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn btn-sm btn-primary" href="{{ route('transaction.edit', $transaction->id)}}">Edit</a>
                        <a class="btn btn-sm btn-secondary" href="{{ route('transaction.index')}}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
