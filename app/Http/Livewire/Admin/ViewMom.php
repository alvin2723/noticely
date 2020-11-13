<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\MinuteOfMeeting;
use Illuminate\Support\Facades\DB;

class ViewMom extends Component
{
    public $data, $mom_id;


    public function mount($id)
    {
        $this->data = MinuteOfMeeting::find($id);
        $this->mom_id = $id;
    }




    public function render()
    {
        $attendee = DB::table('user_mom')
            ->join('staff', 'staff.id_staff', '=', 'user_mom.id_attendee')
            ->join('users', 'users.id', '=', 'staff.id_users')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->where('id_mom', '=', $this->mom_id)->get();


        return view('livewire.admin.view-mom', [
            'data' => $this->data,
            'attendee' => $attendee
        ]);
    }
}
