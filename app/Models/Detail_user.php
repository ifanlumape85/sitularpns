<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_user extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'detail_user';

    protected $fillable = [
        'id_user',
        'tempat_lahir',
        'tgl_lahir',
        'id_ujian',
        'nip',
        'id_golongan',
        'id_jenjang_pendidikan',
        'jabatan',
        'id_skpd'
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

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id');
    }

    public function skpd()
    {
        return $this->belongsTo(Skpd::class, 'id_skpd', 'id');
    }

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'id_ujian', 'id');
    }

    public function jenjang_pendidikan()
    {
        return $this->belongsTo(JenjangPendidikan::class, 'id_jenjang_pendidikan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class, 'id', 'id_detail_user');
    }
}
