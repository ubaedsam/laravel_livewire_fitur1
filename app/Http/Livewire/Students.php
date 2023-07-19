<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    // Data yang di simpan
    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;

    // Untuk fitur searching
    public $searchTerm;

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
    }

    // Proses menambah data student
    public function store()
    {
        $validatedData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        Student::create($validatedData);
        session()->flash('message','Data student berhasil disimpan');
        $this->resetInputFields(); // memanggil fungsi proses public function resetInputFields()
        $this->emit('studentAdded');
    }

    // Proses mengambil data student yang ingin diubah
    public function edit($id)
    {
        $student = Student::where('id',$id)->first();
        $this->ids = $student->id;
        $this->firstname = $student->firstname;
        $this->lastname = $student->lastname;
        $this->email = $student->email;
        $this->phone = $student->phone;
    }

    // proses mengubah data student
    public function update()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        if($this->ids)
        {
            $student = Student::find($this->ids);
            $student->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
            session()->flash('message','Data student berhasil diubah');
            $this->resetInputFields(); // memanggil fungsi proses public function resetInputFields()
            $this->emit('studentUpdated');
        }

    }

    public function delete($id)
    {
        if($id)
        {
            Student::where('id',$id)->delete();
            session()->flash('message','Data student berhasil dihapus');
        }
    }

    use WithPagination; // menggunakan library pagination

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%'; // untuk fitur search

        $students = Student::where('firstname','LIKE',$searchTerm) // mencari data dari firstname
        ->orWhere('lastname','LIKE',$searchTerm) // mencari data dari lastname
        ->orWhere('email','LIKE',$searchTerm) // mencari data dari email
        ->orWhere('phone','LIKE',$searchTerm) // mencari data dari phone
        ->orderBy('id','DESC')->paginate(5); // mengambil semua data students berdasarkan id student secara descending
        return view('livewire.students',['students'=>$students]);
    }
}
