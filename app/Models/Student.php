<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students"; // mengambil semua data dari tabel students

    // Data yang wajib di isi
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone'
    ];
}
