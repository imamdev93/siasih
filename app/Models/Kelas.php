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
}
