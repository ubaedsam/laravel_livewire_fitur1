<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // protected $guarded = []; // Menghubungkan ke dalam tabel appointment

    // protected $table = "appointments";

    protected $fillable = [
        'employee_id',
        'kelas',
        'matpel',
        'status',
        'note',
    ];

    // Relasi antar tabel
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
