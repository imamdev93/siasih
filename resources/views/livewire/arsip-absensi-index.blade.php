<div class="ibox ">
    <div class="ibox-title">
        <h5>Arsip Absensi Siswa</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb-3">
            <div class="col-md-3">
                <select wire:model="semester" class="form-control">
                    <option value="">Pilih Semester</option>
                    @foreach ($semesters as $data)
                        <option value="{{ $data->id }}">{{ $data->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model="siswaId" class="form-control">
                    <option value="">Pilih Siswa</option>
                    @foreach ($siswa as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row justify-content-between mb-3">
            <div class="col-md-1">
                <select class="form-control" wire:model="perPage">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="cari">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">NISN</th>
                        <th width="20%">Nama Siswa</th>
                        <th width="20%">Tanggal</th>
                        <th width="15%">Keterangan</th>
                        <th width="20%">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($absensi) > 0)
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
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $absensi->links() }}
        </div>
    </div>
</div>
