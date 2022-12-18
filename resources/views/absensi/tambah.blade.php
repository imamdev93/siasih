@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tambah Absensi Siswa</h5>
                    <div class="ibox-tools">
                        <form action="{{ route('absensi.all') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Absen Hadir
                                Semua</button>
                        </form>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-hover table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($siswa) > 0)
                                    @foreach ($siswa as $data)
                                        <form action="{{ route('absensi.store') }}" method="post">
                                            @csrf
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><input type="hidden" name="siswa_id"
                                                        value="{{ $data->id }}">{{ $data->nama }}</td>
                                                <td><input type="date" class="form-control" name="tanggal"
                                                        value="{{ old('tanggal', date('Y-m-d')) }}"></td>
                                                <td>
                                                    <select name="keterangan" id="" class="form-control">
                                                        <option value="">Pilih Keterangan</option>
                                                        <option value="masuk">Masuk</option>
                                                        <option value="izin">Izin</option>
                                                        <option value="sakit">Sakit</option>
                                                        <option value="alpa">Alpa</option>
                                                    </select>
                                                    @error('keterangan')
                                                        <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                                                    @enderror
                                                </td>
                                                <td>

                                                    <button type="submit" class="btn btn-primary">Absen</button>

                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" align="center"><span style="text-align: center">Semua Siswa sudah
                                                absen</span>
                                        </td>
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
