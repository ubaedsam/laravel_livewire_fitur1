<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form extends Component
{
    // Data yang disimpan
    public $name;
    public $pesan;
    public $status;
    public $color=[];
    public $fruit;

    public function render()
    {
        return view('livewire.form');
    }
}
