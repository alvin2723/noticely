<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\User;

class UsersSupervisor extends Component
{
    public function render()
    {

        $supervisor = User::join('supervisor', 'supervisor.id_users', '=', 'users.id')
            ->join('division', 'division.id', '=', 'supervisor.division_id')
            ->get(['users.*', 'supervisor.*', 'division.division_name']);
        return view('livewire.admin.users-supervisor', [

            'supervisor' => $supervisor
        ]);
    }
}
