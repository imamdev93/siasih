<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';
    public $guarded = [];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_mapel')->withPivot('hari');
    }
}
