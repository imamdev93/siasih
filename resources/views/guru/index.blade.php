@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="row">
    @include('notification')
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Daftar Guru</h5>
                <div class="ibox-tools">
                    <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                <table class="table table-hover datatable-example">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Nama Guru</th>
                            <th width="30%">Kelas</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($guru) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($guru as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kelas->romawi }} ({{ $data->kelas->nama }})</td>
                            <td>
                                <a class="btn btn-sm btn-secondary" href="{{ route('guru.show', $data->id)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="{{ route('guru.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center">Data tidak ditemukan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.datatable-example').DataTable({
            pageLength: 10,
        });

    });
</script>
@endpush
