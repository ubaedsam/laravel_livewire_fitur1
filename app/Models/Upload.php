<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $table = "uploads"; // mengambil semua data dari tabel uploads

    // Data yang wajib di isi
    protected $fillable = [
        'title',
        'filename'
    ];
}
