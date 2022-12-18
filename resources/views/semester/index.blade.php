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
                    <h5>Daftar Semester</h5>
                    <div class="ibox-tools">
                        <a href="{{ route('semester.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-hover datatable-example">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Judul</th>
                                    <th width="30%">Tanggal Mulai</th>
                                    <th width="20%">Tanggal Selesai</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($semester) > 0)
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($semester as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->judul }}</td>
                                            <td>{{ $data->tanggal_mulai }}</td>
                                            <td>{{ $data->tanggal_selesai }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-secondary"
                                                    href="{{ route('semester.show', $data->id) }}"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('semester.edit', $data->id) }}"><i
                                                        class="fa fa-edit"></i></a>
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
        $(document).ready(function() {
            $('.datatable-example').DataTable({
                pageLength: 10,
            });

        });
    </script>
@endpush
