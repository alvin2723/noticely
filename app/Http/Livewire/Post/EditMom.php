<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\User;
use App\NoteMom;
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
            'objective_mom' => 'required',
            'decision_made' => 'required',
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

    public function update()
    {

        $this->validateData();

        $mom = MinuteOfMeeting::find($this->id_mom);
        if ($mom) {
            $mom->update([
                'title_mom' => $this->title_mom,
                'objective_mom' => $this->objective_mom,
                'decision_made' => $this->decision_made,
                'created_note' => 0,
                'status' => 0
            ]);
            $note = NoteMom::where('note_mom.id_mom', $this->id_mom)->first();

            if ($note) {
                NoteMom::where('note_mom.id_mom', $this->id_mom)->delete();
            }
            session()->flash('message', 'MOM Updated.');
            return redirect()->route('post.draft-mom');
        }
    }
    public function render()
    {
        return view('livewire.post.edit-mom');
    }
}
