<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    public $guarded = [];

    public function mapel()
    {
        return $this->belongsToMany(MataPelajaran::class, 'kelas_mapel')->withPivot('hari');
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function scopeSearch($query, $value, $kelas)
    {
        if ($value) {
            $query->where('nama', 'like', '%' . $value . '%');
        }

        if ($kelas) {
            $query->where('id', $kelas);
        }

        return $query;
    }

    public function getReportAbsensi($kelas, $tipe, $request)
    {
        $data = [];
        foreach ($kelas as $key => $kls) {
            $data[$key]['total_siswa'] = $kls->siswa->count();
            $data[$key]['nama_kelas'] = $kls->nama;
            $data[$key]['masuk'] = $this->countAbsensi($kls->siswa, 'masuk', $request, $tipe);
            $data[$key]['izin'] = $this->countAbsensi($kls->siswa, 'izin', $request, $tipe);
            $data[$key]['sakit'] = $this->countAbsensi($kls->siswa, 'sakit', $request, $tipe);
            $data[$key]['alpa'] = $this->countAbsensi($kls->siswa, 'alpa', $request, $tipe);
        }

        return $data;
    }

    public function countAbsensi($siswa, $ket, $request, $tipe)
    {
        $total = 0;

        foreach ($siswa as $data) {
            switch ($tipe) {
                case 'harian':
                    $total += $data->absensi->where('keterangan', $ket)->where('tanggal', $request)->count();
                    break;
                case 'mingguan':
                    $total += $data->absensi->where('keterangan', $ket)->whereBetween('tanggal', [$request['startDate'], $request['endDate']])->count();
                    break;
                case 'bulanan':
                    $total += $data->filterByMonth($request)->where('keterangan', $ket)->count();
                    break;
                case 'semester':
                    $total += $data->absensi->where('keterangan', $ket)->where('semester_id', $request)->count();
                    break;
            }
        }
        return $total;
    }
}
