<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    // adjust these to match your migration columns (e.g. nama_kelas, name, tingkat, keterangan)
    protected $fillable = [
        'name',
        'wali_kelas_id',
    ];

    /**
     * Relasi ke IzinSiswa
     */
    public function izinSiswa()
    {
        return $this->hasMany(IzinSiswa::class, 'kelas_id');
    }
}
