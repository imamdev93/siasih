@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Beranda</h2>
        <h3>
            Halo, <b>{{ auth()->user()->nama }}</b> !
        </h3>
        <h5>Selamat Datang di Sistem Informasi Akademik SDN Sri Asih</h5>
        @if(session()->get('role') == 'siswa')
        <p>
            <table>
                <tr>
                    <td width="30%">NISN</td>
                    <td width="10%">:</td>
                    <td>{{ auth()->user()->nisn }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ auth()->user()->nama }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>{{ auth()->user()->kelas->romawi ?? '-' }} ({{ auth()->user()->kelas->nama ?? '-' }})</td>
                </tr>
            </table>
        </p>
        @endif
    </div>
</div>
@endsection
