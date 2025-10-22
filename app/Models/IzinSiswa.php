<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IzinSiswa extends Model
{
    use HasFactory;

    // adjust if your migration/table uses a different name
    protected $table = 'izin_siswa';

    protected $fillable = [
        'tanggal_izin',
        'kelas_id',
        'user_id',
        'nama',
        'jenis_izin',
        'status_ketidakhadiran', // added
        'jam_mulai',
        'jam_selesai',           // renamed field used by form/controller
        'keterangan',
    ];

    protected $casts = [
        'tanggal_izin' => 'date',
        'jenis_izin' => 'integer',
        'status_ketidakhadiran' => 'integer',
        'jam_mulai' => 'integer',
        'jam_selesai' => 'integer',
        'user_id' => 'integer',
    ];

    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}

