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
            DB::table('supervisor')->where('id_users', $user->id)->delete();
            $user->delete();
        }
        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('admin.users');
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
