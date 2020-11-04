<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\User;

class UsersManager extends Component
{
    public function render()
    {

        $manager = User::join('manager', 'manager.id_users', '=', 'users.id')->get(['users.*', 'manager.*']);
        return view('livewire.admin.users-manager', [

            'manager' => $manager
        ]);
    }
}
