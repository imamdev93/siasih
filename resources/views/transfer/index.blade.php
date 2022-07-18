@extends('layouts.app')

@section('content')
<div class="row">
    @include('notification')
    @include('transfer.create')
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Transfer List</h5>
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
                            <th width="5%">#</th>
                            <th width="20%">Dari Dompet</th>
                            <th width="20%">Ke Dompet</th>
                            <th width="15%">Jumlah</th>
                            <th width="20%">Catatan</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($transfers) > 0)
                        @foreach ($transfers as $transfer)
                        <tr>
                            <td>#</td>
                            <td>{{ $transfer->fromWallet?->name }}</td>
                            <td>{{ $transfer->toWallet?->name }}</td>
                            <td>{{ number_format($transfer->amount,0,'.','.') }}</td>
                            <td>{{ $transfer->note }}</td>
                            <td>
                                <form method="POST" action="{{ route('transfer.destroy', $transfer->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-sm btn-secondary" href="{{ route('transfer.show', $transfer->id)}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('transfer.edit', $transfer->id)}}"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ditemukan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $transfers->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
