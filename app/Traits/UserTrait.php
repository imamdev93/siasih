<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;

trait UserTrait {

    public function getUser()
    {
        if (session()->get('role') == 'admin') {
            $user = Admin::find(auth()->user()->id);
        } elseif (session()->get('role') == 'guru') {
            $user = Guru::find(auth()->user()->id);
        } else {
            $user = Siswa::find(auth()->user()->id);
        }

        return $user;
    }
}