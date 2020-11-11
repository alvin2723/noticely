<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class EditMom extends Component
{
    public $id_mom, $title_mom, $date_mom, $start_mom, $end_mom, $objective_mom, $decision_made;
    public $attendees = [];
    public $notif = [];

    public function validateData()
    {
        $this->validate([
            'title_mom' => 'required',
            'date_mom' => 'required',
            'start_mom' => 'required',
            'end_mom' => 'required',
            'objective_mom' => 'required',
            'decision_made' => 'required',
            'attendees' => 'required',
            'notif' => 'required',

        ]);
    }

    public function mount($id_mom)
    {

        $mom = MinuteOfMeeting::find($id_mom);

        if ($mom) {
            $this->id_mom = $id_mom;
            $this->title_mom = $mom->title_mom;
            $this->date_mom = $mom->date_mom;
            $this->start_mom = $mom->start_mom;
            $this->end_mom = $mom->end_mom;
            $this->objective_mom = $mom->objective_mom;
            $this->decision_made = $mom->decision_made;
        }
    }

    public function updateAttendee()
    {
        $staff = DB::table('user_mom')
            ->join('staff', 'staff.id_staff', '=', 'user_mom.id_attendee')
            ->where('user_mom.id_mom', $this->id_mom)
            ->select('staff.*')->first();
        $result = array_keys(array_filter($this->attendees));

        foreach ($result as $attendee) {
            if ($attendee != $staff->id_staff) {
                DB::table('user_mom')
                    ->insert([

                        'id_attendee' => $attendee,
                        'id_mom' => $this->id_mom
                    ]);
            }


            LOG::debug($attendee);
        }
    }

    public function update()
    {

        $this->validateData();


        $mom = MinuteOfMeeting::find($this->id_mom);
        if ($mom) {
            $mom->update([
                'title_mom' => $this->title_mom,
                'date_mom' => $this->date_mom,
                'start_mom' => $this->start_mom,
                'end_mom' => $this->end_mom,
                'objective_mom' => $this->objective_mom,
                'decision_made' => $this->decision_made,
                'status' => 0
            ]);
            $this->updateAttendee();
            session()->flash('message', 'MOM Updated.');
        }
    }
    public function render()
    {
        $staff = DB::table('user_mom')
            ->join('mom', 'mom.id', '=', 'user_mom.id_mom')
            ->join('users', 'users.id', '=', 'mom.id_users')
            ->join('staff', 'staff.id_staff', '=', 'user_mom.id_attendee')
            ->where('user_mom.id_mom', $this->id_mom)
            ->select('staff.*')->get();
        $user = User::join('staff', 'staff.id_users', '=', 'users.id')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->select('staff.*', 'division.*')->get();

        $division = DB::table('division')->get();
        return view('livewire.post.edit-mom', [
            'user' => $user,
            'staff' => $staff,
            'division' => $division

        ]);
    }
}
