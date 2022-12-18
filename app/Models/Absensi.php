<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    public $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function (Absensi $absensi) {
            $semester = Semester::where('tanggal_mulai', '>=', date('Y-m-d'))->where('tanggal_selesai', '<=', date('Y-m-d'))->first();
            $absensi->semester_id = $semester->id ?? Semester::orderByDesc('id')->first()->id ?? null; //assigning value
        });
    }
}
