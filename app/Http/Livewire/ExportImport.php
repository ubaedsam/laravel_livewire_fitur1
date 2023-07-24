<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class ExportImport extends Component
{
    // Sweet alert delete data
    protected $listeners = ['deleteConfirmed' => 'deleteEmployee'];

    // Untuk menghapus data
    public $employeeIdBeingRemoved = null;

    public function confirmEmployeeRemoval($employeeId)
    {
        $this->employeeIdBeingRemoved = $employeeId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteEmployee()
    {
        $employee = Employee::findOrFail($this->employeeIdBeingRemoved);

        $employee->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Employee berhasil dihapus']);
    }

    public function render()
    {
        $employees = Employee::paginate(10);

        return view('livewire.export-import',[
            'employees' => $employees,
        ]);

    }
}
