<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;



class CreateMom extends Component
{
    public $title_mom, $date_mom, $start_mom, $end_mom, $objective_mom, $decision_made, $status = '0';
    public $attendees = [];
    public $notif = [];
    public function render()
    {
        $user = User::join('staff', 'staff.id_users', '=', 'users.id')
            ->join('division', 'division.id', '=', 'staff.division_id')
            ->select('staff.*', 'division.*')->get();
        $division = DB::table('division')->get();

        return view('livewire.post.create-mom', [
            'user' => $user,
            'division' => $division
        ]);
    }
    public function resetInputFields()
    {
        $this->title_mom = '';
        $this->date_mom = '';
        $this->start_mom = '';
        $this->end_mom = '';
        $this->objective_mom = '';
        $this->decision_made = '';
    }
    public function store()
    {

        $result = array_keys(array_filter($this->attendees));
        $notification = array_keys(array_filter($this->notif));
        $user_id = Auth::id();
        $staff = DB::table('staff')->where('staff.id_users', $user_id)
        ->first();
        $supervisor = DB::table('supervisor')->where('supervisor.id_supervisor','=',$staff->id_supervisor)->first();
        $super_user = User::where('id',$supervisor->id_users)->first();

        $validatedData = $this->validate([
            'title_mom' => 'required',
            'date_mom' => 'required',
            'start_mom' => 'required',
            'end_mom' => 'required',
            'objective_mom' => 'required',
            'decision_made' => 'required',
            'attendees' => 'required',
            'notif' => 'required',

        ]);
        $mom = MinuteOfMeeting::create([
            'title_mom' => $this->title_mom,
            'date_mom' => $this->date_mom,
            'start_mom' => $this->start_mom,
            'end_mom' => $this->end_mom,
            'objective_mom' => $this->objective_mom,
            'decision_made' => $this->decision_made,
            'status' => $this->status,

        ]);
        foreach ($result as $attendee) {
            DB::table('user_mom')->insert([
                'id_user'=> $user_id,
                'id_mom' => $mom->id,
                'id_attendee' => $attendee
            ]);
            
        }
         $data = array(
            'staff_name' => $staff->name,
            'staff_email' => Auth::user()->email,
            'supervisor' => $super_user->email,
        );
        
        Mail::to('alvinjulian87@gmail.com')->send(new SendMail($data));
        dd($success);
        // session()->flash('message', 'Data Created Successfully.');

        $this->resetInputFields();
        return redirect()->to('/');

        // dd($validatedDate);

    }
}
