<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\User;

class UsersManager extends Component
{
    public function destroy($userId)
    {

        $user = User::find($userId);


        if ($user) {
            $manager = DB::table('manager')->where('id_users', $user->id)->first();
            $supervisor = DB::table('supervisor')->where('id_manager', $manager->id_manager)->get();
            if ($supervisor) {
                session()->flash('message', 'Supervisor memerlukan Manager ini');
            } else {
                DB::table('manager')->where('id_users', $user->id)->delete();
                $user->delete();
                session()->flash('message', 'Data Berhasil Dihapus.');
            }
        }

        //flash message

        //redirect
        return redirect()->route('admin.users-manager');
    }
    public function render()
    {

        $manager = User::join('manager', 'manager.id_users', '=', 'users.id')->get(['users.*', 'manager.*']);
        return view('livewire.admin.users-manager', [

            'manager' => $manager
        ]);
    }
}
