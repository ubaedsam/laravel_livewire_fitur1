<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{
    // Data yang disimpan
    public $name;
    public $email;
    public $phone;
    public $msg;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'msg' => 'required|min:20'
        ]);
    }

    public function simpanForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'msg' => 'required|min:20'
        ]);

        dd($this->name,$this->email,$this->phone,$this->msg);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
