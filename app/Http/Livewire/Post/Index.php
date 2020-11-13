<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\User;
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



        if (Auth::user()->hasRole('Supervisor|Staff')) {
            $users = User::join('staff', 'staff.id_users', '=', 'users.id')
                ->join('supervisor', 'supervisor.id_supervisor', '=', 'staff.id_supervisor')
                ->get();
        } else {
            $users = User::all();
        }

        return view('livewire.post.index', compact('posts', 'users'));
    }
}
