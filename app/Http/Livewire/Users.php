<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination; // menggunakan library pagination livewire
    
    public function render()
    {
        $users = User::paginate(5); // menampilkan semua data user dengan batas maksimal 5 data dalam 1 halaman
        return view('livewire.users',['users'=>$users]);
    }
}
