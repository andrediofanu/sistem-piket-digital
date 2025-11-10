<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IzinSiswa extends Model
{
    use HasFactory;
    protected $table = 'izin_siswa';
    protected $fillable = [
        'tanggal_izin',
        'kelas_id',
        'user_id',
        'nama',
        'jenis_izin',
        'status_ketidakhadiran', 
        'jam_mulai',
        'jam_selesai',           
        'keterangan',
        'admin_piket_id',
        'wali_kelas_id',
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
    public function statusIzinSiswa()
    {
        return $this->belongsTo(\App\Models\StatusIzinSiswa::class, 'status_id');
    }
}

