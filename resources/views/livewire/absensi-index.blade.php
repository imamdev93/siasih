<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Laporan Absensi Harian ({{$filterDate}})</h5>
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
            <div class="row mb-3">
                <div class="col-md-3">
                    <input type="date" class="form-control" wire:model="filterDate">
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Kelas</th>
                        <th width="20%">Total Siswa</th>
                        <th width="15%">Masuk</th>
                        <th width="15%">Izin</th>
                        <th width="15%">Alpa</th>
                        <th width="10%">Sakit</th>
                        <th width="20%">Belum Absen</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dailyReports) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($dailyReports as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data['nama_kelas'] ?? '-' }}</td>
                                <td>{{ $data['total_siswa'] ?? '-' }}</td>
                                <td>{{ $data['masuk'] ?? '-' }}</td>
                                <td>{{ $data['izin'] ?? '-' }}</td>
                                <td>{{ $data['sakit'] ?? '-' }}</td>
                                <td>{{ $data['alpa'] ?? '-' }}</td>
                                <td>{{ $data['total_siswa'] - ($data['masuk'] + $data['izin'] + $data['sakit'] + $data['alpa']) }}
                                    Orang</td>
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