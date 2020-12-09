<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Staff;
use App\Attendee;

class Users extends Component
{
    public function destroy($userId)
    {
        $user = User::find($userId);
        $staff = Staff::where('id_users', $user->id)->first();
        $attendee = Attendee::where('id_attendee', $staff->id_staff)->first();

        if ($attendee) {
            session()->flash('warning', 'This User is an Attendee from the Minute of Meeting, Please Check the Minute of Meeting First!');
            return redirect()->route('admin.users');
        } else {
            Staff::where('id_users', $user->id)->delete();
            $user->delete();
            session()->flash('message', 'Data Deleted.');
            return redirect()->route('admin.users');
        }
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
