<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'guru';
    public $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function setPasswordAttribute($password)
    {   
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
