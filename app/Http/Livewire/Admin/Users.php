<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\User;

class Users extends Component
{
    public function destroy($userId)
    {

        $user = Users::find($userId);

        if ($user) {
            $user->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('admin.users');
    }
    public function render()
    {

        $staff = User::join('staff', 'staff.id_users', '=', 'users.id')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->get(['users.*', 'staff.*', 'division.division_name']);
        return view('livewire.admin.users', [

            'staff' => $staff
        ]);
    }
}
