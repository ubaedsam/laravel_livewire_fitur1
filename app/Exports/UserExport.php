<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'id',
            'nama',
            'Email'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return collect(User::getUser()); // Mengambil data user yang ingin di export menjadi excel
    }
}
