<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\User;
use App\MinuteOfMeeting;

class Dashboard extends Component
{

    public function render()
    {
        $users = User::all()->count();
        $mom = MinuteOfMeeting::all()->count();
        return view('livewire.admin.dashboard', compact('users', 'mom'));
    }
}
