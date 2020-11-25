<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\User;
use App\Staff;
use App\Supervisor;
use App\Notif;
use App\Attendee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;



class CreateMom extends Component
{
    public $title_mom, $date_mom, $start_mom, $end_mom, $objective_mom, $decision_made, $status = '0';
    public $attendees = [];

    public function resetInputFields()
    {
        $this->title_mom = '';
        $this->date_mom = '';
        $this->start_mom = '';
        $this->end_mom = '';
        $this->objective_mom = '';
        $this->decision_made = '';
    }
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

        ]);
    }
    public function saveData($result)
    {
        $mom_name = MinuteOfMeeting::where('title_mom', $this->title_mom)->first();


        if ($mom_name) {
            session()->flash('warning', 'This Title MOM already Exists, Please Enter Another Title!');
            return redirect()->route('post.index');
        } else {
            $mom = MinuteOfMeeting::create([
                'id_users' => Auth::id(),
                'title_mom' => $this->title_mom,
                'date_mom' => $this->date_mom,
                'start_mom' => $this->start_mom,
                'end_mom' => $this->end_mom,
                'objective_mom' => $this->objective_mom,
                'decision_made' => $this->decision_made,
                'count_attendee' => count($result),
                'created_note' => 0,
                'status' => $this->status,
            ]);

            foreach ($result as $attendee) {
                Attendee::create([
                    'id_mom' => $mom->id,
                    'id_attendee' => $attendee,

                ]);
            }

            session()->flash('message', 'New MOM Added.');
        }
    }

    public function store()
    {

        $result = array_keys(array_filter($this->attendees));

        $this->validateData();

        $this->saveData($result);

        $this->resetInputFields();

        return redirect()->route('post.draft-mom');
    }

    public function render()
    {
        $user = User::join('staff', 'staff.id_users', '=', 'users.id')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->select('staff.*', 'division.*')->get();
        $division = DB::table('division')->get();

        return view('livewire.post.create-mom', compact('user', 'division'));
    }
}
