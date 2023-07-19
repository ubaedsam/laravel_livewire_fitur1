<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images"; // mengambil semua data dari tabel images

    // Data yang wajib di isi
    protected $fillable = ['filename'];
}
