<?php

namespace App\Http\Livewire\Admin;

use App\Staff;
use App\Supervisor;
use App\User;
use App\Notif;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Livewire\WithPagination;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DataNotif extends Component
{
    use WithPagination;
    public $notif, $supervisor;
    public function sendEmail()
    {

        $data = array(
            'admin_email' => Auth::user()->email,
            'title_mom' => $this->notif->title_mom,
            'staff_email' => $this->notif->email,
            'id_mom' => $this->notif->id_mom,
        );

        Mail::to($data['staff_email'])->send(new SendMail($data));
    }
    public function sendData($json)
    {
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'http://waping.es/api/send', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => $json
        ]);
        session()->flash('message', 'Notif has been sent to Staff');
    }
    public function sendWhatsapp()
    {
        $json = [
            "token" => "69cc224c07d7ff60eef614d0b9a570c6",
            "source" =>  6285156279328,
            "destination" => (int)$this->notif->phone,
            "type" => "text",
            "body" => [
                "text" => "Hello Word"
            ]
        ];
        $this->sendData($json);
    }

    public function notif($id)
    {

        $this->notif = Notif::join('mom', 'mom.id', '=', 'notif.id_mom')
            ->join('users', 'users.id', '=', 'mom.id_users')
            ->join('staff', 'staff.id_users', '=', 'users.id')
            ->where('notif.id', $id)->first();

        if ($this->notif->notif_type == 'Email') {

            $this->sendEmail();
        } else if ($this->notif->notif_type == 'WhatsApp') {

            $this->sendWhatsapp();
        }
        $this->notif->delete();
    }
    public function render()
    {
        $notification = Notif::join('mom', 'mom.id', '=', 'notif.id_mom')
            ->join('users', 'users.id', '=', 'mom.id_users')
            ->join('staff', 'staff.id_users', '=', 'users.id')
            ->select('notif.*', 'mom.title_mom', 'staff.name')->paginate(5);
        // $staff = Staff::where('staff.id_users', Auth::id())->first();
        // $supervisor = Supervisor::where('supervisor.id_supervisor', '=', $staff->id_supervisor)->first();
        // $super_user = User::where('id', $supervisor->id_users)->first();
        // $data = array(
        //     'staff_name' => $staff->name,
        //     'staff_email' => ->email,
        //     'supervisor' => $super_user->email,
        // );

        // Mail::to($data['supervisor'])->send(new SendMail($data));

        return view('livewire.admin.data-notif', compact('notification'));
    }
}
