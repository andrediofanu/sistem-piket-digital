<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusIzinSiswa extends Model
{
    protected $table = 'status_izin_siswa';
    protected $fillable = ['id', 'name'];
}
