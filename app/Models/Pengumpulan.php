<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;   // tambahkan ini
use App\Models\Tugas;  // tambahkan ini juga kalau belum

class Pengumpulan extends Model
{
    use HasFactory;

    protected $table = 'pengumpulan';

    protected $fillable = ['tugas_id', 'siswa_id', 'file', 'nilai', 'catatan'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
