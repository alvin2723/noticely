<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\NoteMom;
use App\Attendee;
use App\Notif;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DraftDetailMom extends Component
{
    public $data, $user_id, $mom_id, $notes_mom, $note;
    public $notif;
    public function mount($id_mom)
    {
        $this->data = MinuteOfMeeting::find($id_mom);
        $this->note = NoteMom::find($id_mom);
        $this->mom_id = $id_mom;
    }
    public function validateData()
    {
        $this->validate([

            'notes_mom' => 'required',

        ]);
    }
    public function store_note()
    {
        $this->validateData();
        $note = NoteMom::create([
            'id_mom' => $this->mom_id,
            'note_desc' => $this->notes_mom
        ]);
        MinuteOfMeeting::where('id', $this->mom_id)
            ->update([
                'id_note' => $note
            ]);

        session()->flash('message', 'Note Added.');

        return redirect()->route('post.draft-mom');
    }
    public function update_status()
    {
        if (Auth::user()->hasRole('Supervisor')) {
            MinuteOfMeeting::where('id', $this->mom_id)
                ->update([
                    'status' => 1
                ]);
        } else {
            MinuteOfMeeting::where('id', $this->mom_id)
                ->update([
                    'status' => 2
                ]);
            $this->createNotif();
        }
    }
    public function createNotif()
    {
        if ($this->notif == 'email') {
            $notif_type = 'Email';
        } else {
            $notif_type = 'WhatsApp';
        }
        $data = Notif::create([
            'id_mom' => $this->mom_id,
            'notif_type' => $notif_type
        ]);
    }
    public function approve()
    {
        $note = NoteMom::where('note_mom.id_mom', $this->mom_id)->first();

        if ($note) {
            NoteMom::where('note_mom.id_mom', $this->mom_id)->delete();
        }
        $this->update_status();

        session()->flash('message', 'Status Changed.');

        return redirect()->route('post.draft-mom');
    }
    public function render()
    {
        $attendee = Attendee::join('staff', 'staff.id_staff', '=', 'user_mom.id_attendee')
            ->join('users', 'users.id', '=', 'staff.id_users')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->where('id_mom', '=', $this->mom_id)->get();

        if ($this->note) {

            return view('livewire.post.draft-detail-mom', [
                'data' => $this->data,
                'note' => $this->note,
                'attendee' => $attendee
            ]);
        } else {
            return view('livewire.post.draft-detail-mom', [
                'data' => $this->data,
                'attendee' => $attendee
            ]);
        }
    }
}
