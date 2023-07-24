<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Http\Request;
use Livewire\Component;

class AddRemoveStudent extends Component
{
    public function AddStudent(Request $request)
    {
        $request->validate([
            'inputs.*.firstname' => 'required'
        ]);

        // if (is_array($request) || is_object($request)) {
        //     foreach ($request->inputs as $value) {
        //         Student::create($value);
        //     }
        // }

        // foreach ((array)$request->inputs as $value) {
        //     Student::create($value);
        // }

            foreach ($request->inputs ?: [] as $value) {
                Student::create($value);
            }

            return redirect()->back()->with('success','Data student berhasil ditambahkan');
    }

    public function render()
    {
        return view('livewire.add-remove-student');
    }
}
