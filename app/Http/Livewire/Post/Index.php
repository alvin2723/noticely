<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;

class Index extends Component
{
    public $post;
    public function render()
    {
        $post = MinuteOfMeeting::where('status', '=', '3')->get();
        return view('livewire.post.index', [
            'posts' => $post
        ]);
    }
}
