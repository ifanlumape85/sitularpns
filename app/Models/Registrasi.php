<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registrasi extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'registrasi';

    protected $fillable = [
        'id_detail_user',
        'id_jenjang_pendidikan',
        'program_studi',
        'fakultas',
        'universitas',
        'tgl_diterima',
        'biaya',
        'no_registrasi'
    ];

    protected $hidden = [];

    public function getCreatedAtAttribute($date)
    {
        return date('d-m-y H:i:s', strtotime($date));
    }

    public function getUpdatedAtAttribute($date)
    {
        return date('d-m-y H:i:s', strtotime($date));
    }

    public function detail_user()
    {
        return $this->belongsTo(Detail_user::class, 'id_detail_user', 'id');
    }

    public function jenjang_pendidikan()
    {
        return $this->belongsTo(JenjangPendidikan::class, 'id_jenjang_pendidikan', 'id');
    }

    public function persyaratan_user()
    {
        return $this->belongsTo(Persyaratan_user::class, 'id_registrasi', 'id');
    }

    public function persyaratan_users()
    {
        return $this->hasMany(Persyaratan_user::class, 'id_registrasi', 'id');
    }
}
