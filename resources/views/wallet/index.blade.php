@extends('layouts.app')

@section('content')
<div class="row">
    @include('notification')
    @include('wallet.create')
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Wallet List</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="%">#</th>
                            <th width="25%">Nama</th>
                            <th width="25%">Tipe</th>
                            <th width="25%">Saldo</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($wallets) > 0)
                        @foreach ($wallets as $wallet)
                        <tr>
                            <td>#</td>
                            <td>{{ $wallet->name }}</td>
                            <td>{{ $wallet->type }}</td>
                            <td>{{ number_format($wallet->balance,0,'.','.') }}</td>
                            <td>
                                <form method="POST" action="{{ route('wallet.destroy', $wallet->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-sm btn-secondary" href="{{ route('wallet.show', $wallet->id)}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('wallet.edit', $wallet->id)}}"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">Data tidak ditemukan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $wallets->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
