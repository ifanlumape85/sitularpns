<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skpd extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'skpd';

    protected $fillable = [
        'nama_skpd', 'slug'
    ];

    protected $hidden = [];
}
