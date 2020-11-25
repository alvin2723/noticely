<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\Supervisor;
use App\Manager;
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
                ->where('status', '=', '0')->where('mom.id_users', Auth::id())->get();
        } else if (Auth::user()->hasRole('Supervisor')) {
            $supervisor = Supervisor::where('id_users', Auth::id())->first();

            $posts = MinuteOfMeeting::join('staff', 'staff.id_users', '=', 'mom.id_users')
                ->select('mom.*', 'staff.name')
                ->where('created_note', '=', '0')->where('staff.id_supervisor', $supervisor->id_supervisor)->get();
        } else {
            $manager = Manager::where('id_users', Auth::id())->first();

            $posts =  MinuteOfMeeting::join('staff', 'staff.id_users', '=', 'mom.id_users')
                ->select('mom.*', 'staff.*')
                ->where('status', '=', '1')->where('staff.division_id', $manager->division_id)->get();
        }

        return view('livewire.post.draft-mom', compact('posts'));
    }
}
