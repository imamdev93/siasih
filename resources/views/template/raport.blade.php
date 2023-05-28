<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raport</title>
    <style>
        .tengah {
            text-align: center
        }

        /* table {
            width: 100%
        } */

        .font-text {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
    </style>
</head>

<body class="font-text">
    <h4 class="tengah">LAPORAN HASIL BELAJAR SISWA SEMENTARA</h4>
    <br>
    <table style="font-size: 10pt" width="100%">
        <tr>
            <td width="25%">Nama Sekolah</td>
            <td width="5%">:</td>
            <td width="25%">SDN Sri Asih</td>
            <td width="25%">Kelas</td>
            <td width="5%">:</td>
            <td width="25%">{{ $siswa->kelas->romawi ?? '-' }} ({{ $siswa->kelas->nama ?? '-' }})</td>
        </tr>
        <tr>
            <td width="25%">Alamat</td>
            <td width="5%">:</td>
            <td width="25%">Jln. Ahmad Yani</td>
            <td width="25%">Semester</td>
            <td width="5%">:</td>
            <td width="25%">{{ $semester }}</td>
        </tr>
        <tr>
            <td width="25%">Nama Siswa</td>
            <td width="5%">:</td>
            <td width="25%">{{ $siswa->nama ?? '-' }}</td>
            <td width="25%">Tahun Pelajaran</td>
            <td width="5%">:</td>
            <td width="25%">{{ $siswa->kelas->kurikulum->tahun ?? '-' }}</td>
        </tr>
        <tr>
            <td width="25%">Nomor Induk</td>
            <td width="5%">:</td>
            <td width="25%">{{ $siswa->nisn ?? '-' }}</td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1" cellspacing="0" style="font-size: 10pt">
        <thead>
            <tr>
                <th rowspan="2" width="5%" class="tengah">No</th>
                <th rowspan="2" width="25%" class="tengah">Mata Pelajaran</th>
                <th rowspan="2" width="8%" class="tengah">KKM</th>
                <th colspan="2" width="37%" class="tengah">Nilai</th>
                <th rowspan="2" width="25%" class="tengah">Keterangan</th>
            </tr>
            <tr>
                <th width="8%" class="tengah">Angka</th>
                <th width="29%" class="tengah">Huruf</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $total = 0;
                $pembagi = 0;
            @endphp
            @foreach ($raport as $data)
                @php
                    $total += $data->nilai[0]->nilai ?? 0;
                    $pembagi += count($data->nilai) > 0 ? 1 : 0;
                @endphp
                <tr>
                    <td class="tengah">{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td class="tengah">70</td>
                    <td class="tengah">{{ $data->nilai[0]->nilai ?? '-' }}</td>
                    <td class="tengah">
                        {{ count($data->nilai) > 0 ? ucwords(\Terbilang::make($data->nilai[0]->nilai)) : '-' }}</td>
                    <td>-</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="tengah"><b>Jumlah</b></td>
                <td class="tengah"><b>{{ $total }}</b></td>
                <td class="tengah"><b>{{ $total > 0 ? ucwords(\Terbilang::make($total)) : 0 }}</b></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" class="tengah"><b>Rata-rata</b></td>
                <td class="tengah"><b>{{ $total > 0 ? $total / $pembagi : 0 }}</b></td>
                <td class="tengah"><b>{{ $total > 0 ? ucwords(\Terbilang::make($total / $pembagi)) : 0 }}</b></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    {{-- <table width="50%" border="1" cellspacing="0" style="table-layout:fixed;font-size: 10pt">
        <tr>
            <th colspan="2" class="center">Ketidakhadiran</th>
        </tr>
        <tr>
            <td width="25%">Sakit</td>
            <td width="25%">1</td>
        </tr>
        <tr>
            <td width="25%">Izin</td>
            <td width="25%">1</td>
        </tr>
        <tr>
            <td width="25%">Tanpa Keterangan</td>
            <td width="25%">1</td>
        </tr>
    </table> --}}
    <br><br><br>
    <table style="font-size: 10pt" width="100%">
        <tbody>
            <tr>
                <td class="center" width="35%">Mengetahui, </td>
                <td width="30%"></td>
                <td width="20%" class="center">Wali Kelas</td>
            </tr>
            <tr>
                <td class="center"> Orang Tua / wali</td>
                <td class="center"></td>
                <td class="center"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="center"><u>.............................</u></td>
                <td class="center"></td>
                <td class="center"><u>{{ $waliKelas->nama ?? '-' }}</u></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
