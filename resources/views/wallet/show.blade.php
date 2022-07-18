@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Detail Dompet</h5>
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
                        {{ $wallet->name}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Icon</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $wallet->icon}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Deskripsi</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ $wallet->description}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Saldo</label>
                    <div class="col-lg-10" style="margin-top: 8px">
                        {{ number_format($wallet->balance,0,'.','.')}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Riwayat Dompet</label>
                    <div class="col-lg-10 table-responsive" style="margin-top: 8px" >
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Tipe Transaksi</th>
                                    <th width="25%">Jumlah</th>
                                    <th width="25%">Catatan</th>
                                    <th width="25%">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($wallet->histories) > 0)
                                @foreach ($wallet->histories as $history)
                                <tr>
                                    <td>#</td>
                                    <td>
                                        @if($history->type == \App\Enums\TypeStatusEnum::pemasukan())
                                            <span class="badge badge-success">{{$history->type}}</span>
                                        @else
                                            <span class="badge badge-danger">{{$history->type}}</span>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($history->amount,0,'.','.') }}</td>
                                    <td>{{ $history->note ?? '-' }}</td>
                                    <td>{{ $history->created_at }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn btn-sm btn-primary" href="{{ route('wallet.edit', $wallet->id)}}">Edit</a>
                        <a class="btn btn-sm btn-secondary" href="{{ route('wallet.index')}}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
