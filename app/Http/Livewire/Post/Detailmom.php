<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class Detailmom extends Component
{
    public $data, $user_id;

    public function mount($id_mom)
    {
        $this->data = MinuteOfMeeting::find($id_mom);
        $this->user_id = $id_mom;
    }
    public function render()
    {
        $attendee = DB::table('user_mom')
            ->join('users', 'users.id', '=', 'user_mom.id_user')
            ->join('staff', 'staff.id_staff', '=', 'user_mom.id_attendee')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->where('id_mom', '=', $this->user_id)->get();

        return view('livewire.post.detailmom', [
            'data' => $this->data,
            'attendee' => $attendee
        ]);
    }
}
