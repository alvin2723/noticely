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
            $posts = MinuteOfMeeting::join('staff', 'staff.id_users', '=', 'mom.id_users')
                ->select('mom.*', 'staff.name')
                ->where('status', '=', '0')->orWhere('status', '=', '1')->get();
        } else if (Auth::user()->hasRole('Supervisor')) {
            $posts = MinuteOfMeeting::join('staff', 'staff.id_users', '=', 'mom.id_users')
                ->select('mom.*', 'staff.name')
                ->where('status', '=', '0')->get();
        } else {
            $posts =  MinuteOfMeeting::join('staff', 'staff.id_users', '=', 'mom.id_users')
                ->select('mom.*', 'staff.name')
                ->where('status', '=', '2')->get();
        }

        return view('livewire.post.draft-mom', compact('posts'));
    }
}
