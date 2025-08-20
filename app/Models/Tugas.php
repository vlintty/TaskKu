<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = ['judul','deskripsi','deadline','guru_id', 'mata_pelajaran'];

    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class,'guru_id');
    }
}
