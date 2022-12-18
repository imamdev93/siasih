<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Absensi</title>
</head>

<body>
    <table>
        <tr>
            <th colspan="7" align="center" style="font-size: 14px">Laporan Absensi {{ $tipe }} Periode
                {{ is_array($request) ? $request['startDate'] . ' - ' . $request['endDate'] : $request }}</th>
        </tr>
    </table>
    <table>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah Siswa (Orang)</th>
            <th>Hadir (Orang)</th>
            <th>Izin (Orang)</th>
            <th>Sakit (Orang)</th>
            <th>Alpa (Orang)</th>
        </tr>
        @forelse ($reports as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['nama_kelas'] }}</td>
                <td>{{ $data['total_siswa'] }}</td>
                <td>{{ $data['masuk'] }}</td>
                <td>{{ $data['izin'] }}</td>
                <td>{{ $data['sakit'] }}</td>
                <td>{{ $data['alpa'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" align="center">Laporan absensi tidak ditemukan</td>
            </tr>
        @endforelse

    </table>
</body>

</html>
