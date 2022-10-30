<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenjangPendidikan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jenjang_pendidikan';

    protected $fillable = [
        'nama_jenjang_pendidikan', 'slug'
    ];

    protected $hidden = [];
}
