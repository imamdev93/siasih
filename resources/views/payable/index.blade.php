@extends('layouts.app')

@section('content')
<div class="row">
    @include('notification')
    @include('payable.payment')
    @include('payable.create')
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Payable List</h5>
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
                            <th width="20%">Judul</th>
                            <th width="25%">Deskripsi</th>
                            <th width="15%">Sisa Hutang</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($payables) > 0)
                        @foreach ($payables as $payable)
                        <tr>
                            <td>#</td>
                            <td>{{ $payable->title }}</td>
                            <td>{{ $payable->description }}</td>
                            <td>{{ number_format($payable->amount,0,'.','.') }}</td>
                            <td>
                                <form method="POST" action="{{ route('payable.destroy', $payable->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-sm btn-secondary" href="{{ route('payable.show', $payable->id)}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('payable.edit', $payable->id)}}"><i class="fa fa-edit"></i></a>
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
                {{ $payables->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
