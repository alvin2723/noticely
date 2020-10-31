<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;

class Detailmom extends Component
{
    public $data;
    public function mount($id_mom)
    {
        $this->data = MinuteOfMeeting::find($id_mom);
    }
    public function render()
    {

        return view('livewire.post.detailmom', [
            'data' => $this->data
        ]);
    }
}
