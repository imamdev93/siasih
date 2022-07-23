<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    public $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
