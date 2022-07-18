@extends('layouts.app')

@section('content')
<div class="row">
    @include('notification')
    @include('receivable.payment')
    @include('receivable.create')
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Receivable List</h5>
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
                            <th width="20%">Dompet</th>
                            <th width="20%">Judul</th>
                            <th width="25%">Deskripsi</th>
                            <th width="15%">Sisa Hutang</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($receivables) > 0)
                        @foreach ($receivables as $receivable)
                        <tr>
                            <td>#</td>
                            <td>{{ $receivable->wallet?->name }}</td>
                            <td>{{ $receivable->title }}</td>
                            <td>{{ $receivable->description }}</td>
                            <td>{{ number_format($receivable->amount,0,'.','.') }}</td>
                            <td>
                                <form method="POST" action="{{ route('receivable.destroy', $receivable->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-sm btn-secondary" href="{{ route('receivable.show', $receivable->id)}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('receivable.edit', $receivable->id)}}"><i class="fa fa-edit"></i></a>
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
                {{ $receivables->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
