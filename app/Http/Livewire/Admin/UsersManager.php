<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Manager;
use App\Supervisor;

class UsersManager extends Component
{
    public function destroy($userId)
    {

        $user = User::find($userId);


        if ($user) {
            $manager = Manager::where('id_users', $user->id)->first();
            $supervisor = Supervisor::where('id_manager', $manager->id_manager)->get();
            if ($supervisor) {
                session()->flash('warning', 'Please delete the Supervisor that have this ManagerID!');
                return redirect()->route('admin.users-supervisor');
            } else {
                Manager::where('id_users', $user->id)->delete();
                $user->delete();
                session()->flash('message', 'Data Deleted.');
            }
        }

        //flash message

        //redirect
        return redirect()->route('admin.users-manager');
    }
    public function render()
    {
        $manager = User::join('manager', 'manager.id_users', '=', 'users.id')
            ->join('division', 'division.id', '=', 'manager.division_id')
            ->get(['users.*', 'manager.*', 'division.division_name']);


        return view('livewire.admin.users-manager', [

            'manager' => $manager
        ]);
    }
}
