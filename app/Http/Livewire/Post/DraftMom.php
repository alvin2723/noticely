<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DraftMom extends Component
{
    public function render()
    {
        if (Auth::user()->hasRole('Staff')) {
            $post = MinuteOfMeeting::where('status', '=', '0')->orWhere('status', '=', '1')->get();
        } else if (Auth::user()->hasRole('Supervisor')) {
            $post = MinuteOfMeeting::where('status', '=', '2')->get();
        } else {
            $post = MinuteOfMeeting::where('status', '=', '3')->get();
        }

        return view('livewire.post.draft-mom', [
            'posts' => $post
        ]);
    }
}
