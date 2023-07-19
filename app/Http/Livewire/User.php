<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User as Users;
use App\Exports\UserExport;
use Excel;
use PDF;
use App\Imports\UserImport;

class User extends Component
{
    // Data yang disimpan
    public $users;

    // Export data ke excel
    public function exportIntoExcel()
    {
        return Excel::download(new UserExport,'userlist.xlsx');
    }

    // Export data ke CSV
    public function exportIntoCSV()
    {
        return Excel::download(new UserExport,'userlist.csv');
    }

    // Export data ke PDF
    public function getAllUser()
    {
        $users = Users::all();
        return view('pdfuser',compact('users'));
    }

    // Export data ke PDF
    public function downloadPDF()
    {
        $users = Users::all();
        $pdf = PDF::loadView('pdfuser',compact('users'));
        return $pdf->download('users.pdf');
    }

    // Import data CSV atau Excel
    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        Excel::import(new UserImport,$request->file);
        return "Data user berhasil di import";
    }

    // Cetak satu data user ke dalam pdf
    public function print_pdf($id)
    {
        $users = Users::find($id);

        $pdf = PDF::loadView('pdfsingleuser',compact('users'));

        return $pdf->download('detail-user.pdf');
    }

    public function render()
    {
        $this->users = Users::all(); // mengambil semua data

        return view('livewire.user');
    }
}
