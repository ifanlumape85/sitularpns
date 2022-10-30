<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ujian extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ujian';

    protected $fillable = [
        'nama_ujian', 'deskripsi', 'slug'
    ];

    protected $hidden = [];

    public function persyaratan()
    {
        return $this->hasMany(Persyaratan::class, 'id_ujian', 'id');
    }
}
