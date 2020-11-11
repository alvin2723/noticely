<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;

class Index extends Component
{
    public $post;
    public function render()
    {
        $posts = MinuteOfMeeting::join('staff', 'staff.id_users', '=', 'mom.id_users')
            ->select('mom.*', 'staff.name')
            ->where('mom.status', '=', '3')->get();

        return view(
            'livewire.post.index',
            compact('posts')
        );
    }
}
