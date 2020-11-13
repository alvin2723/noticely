<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Division;
use Livewire\WithPagination;

class DataDivision extends Component
{
    use WithPagination;
    public function destroy($divisionId)
    {

        $data = Division::find($divisionId);

        if ($data) {
            $data->delete();
        }
        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');
        //redirect
        return redirect()->route('admin.data-division');
    }
    public function render()
    {
        $division = Division::all();
        return view('livewire.admin.data-division', [
            'division' => $division
        ]);
    }
}
