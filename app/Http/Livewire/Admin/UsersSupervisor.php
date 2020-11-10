<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersSupervisor extends Component
{
    public function destroy($userId)
    {

        $user = User::find($userId);

        if ($user) {
            $supervisor = DB::table('supervisor')->where('id_users', $user->id)->first();
            $staff = DB::table('staff')->where('id_supervisor', $supervisor->id_supervisor)->get();
            if ($staff) {
                //flash message
                session()->flash('warning', 'Please delete the Staff that has this SupervisorID!');
                return redirect()->route('admin.users');
            } else {
                DB::table('supervisor')->where('id_users', $user->id)->delete();
                $user->delete();
                //flash message
                session()->flash('message', 'Data Deleted.');
            }
        }


        //redirect
        return redirect()->route('admin.users-supervisor');
    }
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
