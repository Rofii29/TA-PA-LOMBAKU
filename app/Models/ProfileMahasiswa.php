<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'profile_mahasiswa';

    protected $fillable = [
        'user_id',
        'nim',
        'universitas',
        'program_studi',
        'fakultas',
        'tanggal_lahir',
        'headline',
        'deskripsi_diri',
        'alamat',
        'sosial_media',
        'foto_profil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}