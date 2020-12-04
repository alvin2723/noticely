<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\User;
use App\Staff;
use App\Supervisor;
use App\Manager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $post;
    public function render()
    {
        $posts = MinuteOfMeeting::join('staff', 'staff.id_users', '=', 'mom.id_users')
            ->select('mom.*', 'staff.name')
            ->where('mom.status', '=', '3')->get();
        if (Auth::user()->hasRole('Staff')) {
            $users = Staff::where('id_users', Auth::id())->get();
        }
        if (Auth::user()->hasRole('Supervisor')) {

            $supervisor =  Supervisor::where('id_users', Auth::id())->first();
            $users =  Staff::where('id_supervisor', $supervisor->id_supervisor)->get();
        } else if (Auth::user()->hasRole('Manager')) {
            $manager = Manager::where('id_users', Auth::id())->first();

            $users =  Staff::where('division_id', $manager->division_id)->get();
        }

        return view('livewire.post.index', compact('posts', 'users'));
    }
}
