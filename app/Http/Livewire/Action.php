<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Action extends Component
{
    // Data yang disimpan
    public $num1;
    public $num2;
    public $sum;
    public $pesan;

    // Menjumlahkan data dari sebuah tombol
    public function addTwoNumbers($num1, $num2)
    {
        $this->sum = $num1 + $num2;
    }

    // Menampilkan pesan
    public function TampilkanPesan($psn)
    {
        $this->pesan = $psn;
    }

    // Menjumlahkan data dari sebuah input data nilai
    public function getJumlah()
    {
        $this->sum = $this->num1 + $this->num2;
    }

    public function render()
    {
        return view('livewire.action');
    }
}
