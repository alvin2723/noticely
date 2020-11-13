<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Division;

class CreateDivision extends Component
{
    public $division_name;
    public function validateData()
    {
        $this->validate([
            'division_name' => 'required',
        ]);
    }
    public function resetInputFields()
    {
        $this->division_name = '';
    }
    public function store()
    {
        $this->validateData();
        $divisi = Division::where('division_name', $this->division_name)->get();
        if ($divisi) {
            session()->flash('warning', 'Division Name can not be the same!');
            return redirect()->route('admin.data-division');
        } else {
            Division::create([
                'division_name' => $this->division_name
            ]);
            //redirect
            $this->resetInputFields();
            return redirect()->route('admin.data-division');
        }
    }
    public function render()
    {
        return view('livewire.admin.create-division');
    }
}
