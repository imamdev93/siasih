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
                <h5>Daftar Konsultasi Siswa</h5>
                @if (session()->get('role') == 'siswa')
                    <div class="ibox-tools">
                        <a href="{{ route('konsultasi.create') }}" class="btn btn-primary btn-sm">Tambah</a>
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
                            <th width="30%">Isi Konsultasi</th>
                            <th width="30%">Jawaban</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($konsultasi) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($konsultasi as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->siswa->nisn ?? '-'}}</td>
                            <td>{{ $data->siswa->nama ?? '-'}}</td>
                            <td>{!! $data->isi_konsultasi !!}</td>
                            <td>{{ $data->jawaban ?? 'Belum ada jawaban' }}</td>
                            <td>
                                @if (session()->get('role') == 'guru')
                                <a class="btn btn-sm btn-primary" href="{{ route('konsultasi.feedback', $data->id)}}"><i class="fa fa-edit"></i></a>
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
