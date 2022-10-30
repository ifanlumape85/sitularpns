<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persyaratan_user extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'persyaratan_user';

    protected $fillable = [
        'id_persyaratan', 'id_registrasi', 'berkas'
    ];

    protected $hidden = [];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class, 'id_registrasi', 'id');
    }

    public function persyaratan()
    {
        return $this->belongsTo(Persyaratan::class, 'id_persyaratan', 'id');
    }
}
