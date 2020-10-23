<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;

class Index extends Component
{
    public $post;
    public function render()
    {
        $this->post = MinuteOfMeeting::all();
        return view('livewire.post.index');
    }
}
