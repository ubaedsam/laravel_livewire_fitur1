<?php

namespace App\Http\Livewire;

use App\Imports\AppointmentImport;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Http\Request;

class Appointment extends Component
{
    // Import data CSV atau Excel
    public function importForm()
    {
        $employees = Employee::all();
        return view('import-formappointment',['employees' => $employees]);
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('public/import');

        $import = new AppointmentImport;
        $import->import($file);

        // Jika terjadi duplikat akan tetapi ada data yang belum ada
        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }

        return redirect('/import-appointment')->with('success','Data berhasil di import');
    }
    
    public function render()
    {
        return view('livewire.appointment');
    }
}
