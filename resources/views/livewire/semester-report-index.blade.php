<div class="ibox ">
    <div class="ibox-title">
        <h5>Laporan Semester Absensi Siswa</h5>
        <div class="ibox-tools">
            <a wire:click="cetak()" class="btn btn-primary btn-sm">Cetak Laporan</a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row mb-12">
            <div class="col-md-3">
                <select name="" id="" class="form-control" wire:model="filterSemester">
                    @foreach ($semester as $data)
                        <option value="{{ $data->id }}">{{ $data->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row justify-content-between mb-3">
            <div class="col-md-1">
                {{-- <select class="form-control" wire:model="perPage">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> --}}
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="cari kelas">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Kelas</th>
                        <th width="20%">Jumlah Siswa</th>
                        <th width="10%">Hadir</th>
                        <th width="10%">Izin</th>
                        <th width="10%">Sakit</th>
                        <th width="10%">Alpa</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($semesterReports) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($semesterReports as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data['nama_kelas'] ?? '-' }}</td>
                                <td>{{ $data['total_siswa'] ?? '-' }}</td>
                                <td>{{ $data['masuk'] ?? '-' }}</td>
                                <td>{{ $data['izin'] ?? '-' }}</td>
                                <td>{{ $data['sakit'] ?? '-' }}</td>
                                <td>{{ $data['alpa'] ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
