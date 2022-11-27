<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Golongan extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'golongan';

    protected $fillable = [
        'nama_pangkat', 'golongan', 'ruang', 'slug'
    ];

    protected $hidden = [];
}
