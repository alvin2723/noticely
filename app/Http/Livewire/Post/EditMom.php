<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;


class EditMom extends Component
{
    public function mount($id_mom)
    {

        return view('livewire.post.edit-mom');
    }
}
