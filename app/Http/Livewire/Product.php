<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    // Data yang disimpan
    public $title;
    public $name;
    public $infos = []; // banyak proses input data function

    public function mount()
    {
        $this->infos[] = 'Aplikasi sedang berjalan....';
    }

    public function hydrate()
    {
        $this->infos[] = 'Aplikasi sedang memproses....';
    }

    public function updating($name, $value)
    {
        $this->infos[] = 'Aplikasi sedang berubah....';
    }

    public function updated($name,$value)
    {
        $this->infos[] = 'Aplikasi telah berubah....';
    }

    public function updatingName()
    {
        $this->infos[] = 'Aplikasi sedang berubah nama....';
    }

    public function updatedName()
    {
        $this->infos[] = 'Aplikasi telah berubah nama....';
    }

    public function render()
    {
        return view('livewire.product');
    }
}
