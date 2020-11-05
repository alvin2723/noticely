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
            DB::table('manager')->where('id_users', $user->id)->delete();
            $user->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('admin.users');
    }
    public function render()
    {

        $manager = User::join('manager', 'manager.id_users', '=', 'users.id')->get(['users.*', 'manager.*']);
        return view('livewire.admin.users-manager', [

            'manager' => $manager
        ]);
    }
}
