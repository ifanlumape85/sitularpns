<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persyaratan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'persyaratan';

    protected $fillable = [
        'id_ujian', 'nama_persyaratan', 'slug'
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
    
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'id_ujian', 'id');
    }

    public function persyaratan_user()
    {
        return $this->hasMany(Persyaratan_user::class, 'id_persyaratan', 'id');
    }
}
