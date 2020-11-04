<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\MinuteOfMeeting;

class ViewMom extends Component
{
    public $data;


    public function mount($id)
    {
        $this->data = MinuteOfMeeting::find($id);
    }




    public function render()
    {

        return view('livewire.admin.view-mom', [
            'data' => $this->data
        ]);
    }
}
