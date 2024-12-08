<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    // Menambahkan kolom yang diizinkan untuk mass assignment
    protected $fillable = ['nama', 'testimoni'];
}
