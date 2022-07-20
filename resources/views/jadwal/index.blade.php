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
                <h5>Daftar Jadwal {{ session()->get('role') == 'siswa' ? 'Pelajaran' : 'Mengajar' }}</h5>
               
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                <table class="table table-hover datatable-example">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Kelas</th>
                            <th width="20%">Mata Pelajaran</th>
                            <th width="20%">Hari</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($jadwal) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jadwal as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->kelas->romawi ?? '-'}} ({{ $data->kelas->nama ?? '-'}})</td>
                            <td>{{ $data->mapel->nama ?? '-'}}</td>
                            <td>{{ $data->hari }}</td>
                            <td>
                                @if (session()->get('role') == 'admin')
                                <a class="btn btn-sm btn-secondary" href="{{ route('jadwal.show', $data->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="{{ route('jadwal.edit', $data->id) }}"><i class="fa fa-edit"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">Data tidak ditemukan</td>
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
