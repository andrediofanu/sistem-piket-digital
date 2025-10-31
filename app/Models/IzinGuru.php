<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IzinGuru extends Model
{
    use HasFactory;

    // adjust if your migration/table uses a different name
    protected $table = 'izin_guru';

    protected $fillable = [
        'tanggal_izin',
        'jam_mulai',
        'jam_selesai', 
        'user_id',
        'kelas_id',
        'mata_pelajaran_id',
        'status_ketidakhadiran',
        'keterangan',
        'guru_pengganti_id',
        'bentuk_tugas',
        'admin_piket_id',
        'status_id',             
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
    public function adminPiket()
    {
        return $this->belongsTo(\App\Models\User::class, 'admin_piket_id');
    }
    public function waliKelas()
    {
        return $this->belongsTo(\App\Models\User::class, 'wali_kelas_id');
    }
    public function statusIzinGuru()
    {
        return $this->belongsTo(\App\Models\StatusIzinGuru::class, 'status_id');
    }
    public function mataPelajaran()
    {
        return $this->belongsTo(\App\Models\MataPelajaran::class, 'mata_pelajaran_id');
    }
}

