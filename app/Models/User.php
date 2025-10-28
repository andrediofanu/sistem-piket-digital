<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // adjust foreign key if needed
    }
    // public function profile()
    // {
    //     return $this->hasOne(Profile::class);
    // }

    // protected static function booted()
    // {
    //     static::created(function ($user) {
    //         // Automatically create profile
    //         $user->profile()->create([
    //             'alamat' => null,
    //             'telepon' => null,
    //             'jabatan' => $user->role === 'Guru' ? 'Guru' : null,
    //             'kelas_id' => $user->role === 'Siswa' ? null : null, // adjust if you have kelas table
    //             'tanggal_lahir' => null,
    //         ]);
    //     });
    // }
}
