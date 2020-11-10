<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\User;
use Illuminate\Support\Facades\DB;


class EditMom extends Component
{
    public $title_mom, $date_mom, $start_mom, $end_mom, $objective_mom, $decision_made, $mom;
    public $attendees = [];
    public $notif = [];
    public function mount($id_mom)
    {

        $this->mom = MinuteOfMeeting::find($id_mom);
        if ($this->mom) {

            $this->title_mom = $this->mom->title_mom;
            $this->date_mom = $this->mom->date_mom;
            $this->start_mom = $this->mom->start_mom;
            $this->end_mom = $this->mom->end_mom;
            $this->objective_mom = $this->mom->objective_mom;
            $this->decision_made = $this->mom->decision_made;
        }
    }

    public function update()
    {
    }
    public function render()
    {
        $user = User::join('staff', 'staff.id_users', '=', 'users.id')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->select('staff.*', 'division.*')->get();
        $division = DB::table('division')->get();
        return view('livewire.post.edit-mom', [
            'user' => $user,
            'division' => $division

        ]);
    }
}
