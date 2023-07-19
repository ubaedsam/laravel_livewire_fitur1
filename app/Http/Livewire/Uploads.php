<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Livewire\Component;
use Livewire\WithFileUploads; // library untuk mengupload data file

class Uploads extends Component
{
    // Data yang disimpan
    public $title;
    public $filename;

    use WithFileUploads; // menggunakan library file upload

    // Proses menyimpan data file
    public function fileUpload()
    {
        $validateData = $this->validate([
            'title' => 'required',
            'filename' => 'required'
        ]);

        $filename = $this->filename->store('files','public');
        $validateData['filename'] = $filename;
        Upload::create($validateData);
        session()->flash('message','File berhasil tersimpan/dikirim');
        $this->emit('fileUploaded');

    }

    public function render()
    {
        return view('livewire.uploads');
    }
}
