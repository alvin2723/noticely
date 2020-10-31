<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;

class DraftMom extends Component
{
    public function render()
    {
        $post = MinuteOfMeeting::where('status', '=', '0')->get();
        return view('livewire.post.draft-mom', [
            'posts' => $post
        ]);
    }
}
