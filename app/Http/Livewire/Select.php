<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\Regency;
use Livewire\Component;

class Select extends Component
{
    // public $province;
    // public $regencies = [];
    // public $regency;

    public $selectedProvince = null;
    public $selectedRegency = null;
    public $regencies = null;

    public function updatedSelectedProvince($province_id)
    {
        $this->regencies = Regency::where('province_id',$province_id)->get();
    }

    public function render()
    {
        return view('livewire.select')->with([
            'provincies'=> Province::all(),
        ]);
    }
}
