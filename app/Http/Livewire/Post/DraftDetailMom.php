<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;

class DraftDetailMom extends Component
{
    public $data;
    public function mount($id_mom)
    {
        $this->data = MinuteOfMeeting::find($id_mom);
    }
    public function render()
    {

        return view('livewire.post.draft-detail-mom', [
            'data' => $this->data
        ]);
    }
}
