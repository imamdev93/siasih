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
                <h5>Daftar Absensi Siswa</h5>
                @if (session()->get('role') != 'siswa' && !auth()->user()->is_kepsek)
                    <div class="ibox-tools">
                        <a href="{{ route('absensi.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>
                @endif
               
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                <table class="table table-hover datatable-example">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">NISN</th>
                            <th width="20%">Nama Siswa</th>
                            <th width="20%">Tanggal</th>
                            <th width="15%">Keterangan</th>
                            <th width="20%">Kelas</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($absensi) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($absensi as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->siswa->nisn ?? '-'}}</td>
                            <td>{{ $data->siswa->nama ?? '-'}}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->siswa->kelas->romawi ?? '-' }} ({{ $data->siswa->kelas->nama ?? '-' }})</td>
                            <td>
                                @if (session()->get('role') != 'siswa')
                                <form action="{{ route('absensi.destroy', $data->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                <a class="btn btn-sm btn-secondary" href="{{ route('absensi.show', $data->id)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="{{ route('absensi.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger" onclick="confirm('apakah anda yakin?')" ><i class="fa fa-trash"></i></button>
                                </form>
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
