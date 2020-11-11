<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DraftDetailMom extends Component
{
    public $data, $user_id, $mom_id, $notes_mom;
    public function mount($id_mom)
    {
        $this->data = MinuteOfMeeting::find($id_mom);
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
        MinuteOfMeeting::where('id', $this->mom_id)
            ->update([
                'status' => 1
            ]);
        DB::table('note_mom')->insert([
            'id_mom' => $this->mom_id,
            'note_desc' => $this->notes_mom
        ]);
        session()->flash('message', 'Note Added.');



        return redirect()->route('post.draft-mom');
    }
    public function update_status()
    {
        if (Auth::user()->hasRole('Supervisor')) {
            MinuteOfMeeting::where('id', $this->mom_id)
                ->update([
                    'status' => 2
                ]);
        } else {
            MinuteOfMeeting::where('id', $this->mom_id)
                ->update([
                    'status' => 3
                ]);
        }
    }
    public function approve()
    {
        $note = DB::table('note_mom')
            ->where('note_mom.id_mom', $this->mom_id)->first();

        if ($note) {
            DB::table('note_mom')
                ->where('note_mom.id_mom', $this->mom_id)->delete();

            $this->update_status();
        }

        session()->flash('message', 'Status Changed.');

        return redirect()->route('post.draft-mom');
    }
    public function render()
    {
        $attendee = DB::table('user_mom')
            ->join('mom', 'mom.id', '=', 'user_mom.id_mom')
            ->join('users', 'users.id', '=', 'mom.id_users')
            ->join('staff', 'staff.id_staff', '=', 'user_mom.id_attendee')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->where('id_mom', '=', $this->mom_id)->get();
        return view('livewire.post.draft-detail-mom', [
            'data' => $this->data,
            'attendee' => $attendee
        ]);
    }
}
