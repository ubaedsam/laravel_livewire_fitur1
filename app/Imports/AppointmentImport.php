<?php

namespace App\Imports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AppointmentImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Appointment([
            'employee_id' => $row['employee_id'],
            'kelas' => $row['kelas'],
            'matpel' => $row['matpel'],
            'status' => $row['status'],
            'note' => $row['note'],
        ]);
    }

    // Validasi
    public function rules(): array
    {
        return [
            'employee_id' => 'required',
            'kelas' => 'required|unique:appointments',
            'matpel' => 'required',
            'status' => 'required',
            'note' => 'required',
        ];
    }
}
