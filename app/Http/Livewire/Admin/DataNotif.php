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

        );

        Mail::to($data['staff_email'])->send(new SendMail($data));
        $data = Notif::where('id_mom', $this->notif->id_mom);
        $data->delete();
    }
    public function sendData($json)
    {
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'http://waping.es/api/send', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => $json
        ]);
    }
    public function sendWhatsapp()
    {
        $json = [
            "token" => "69cc224c07d7ff60eef614d0b9a570c6",
            "source" =>  6285156279328,
            "destination" => (int)$this->notif->phone,
            "type" => "text",
            "body" => [
                "text" => "Your Minute Of Meeting that has a title " . $this->notif->title_mom . "has Been Approved by Manager"
            ]
        ];
        $this->sendData($json);
        $data = Notif::where('id_mom', $this->notif->id_mom);
        $data->delete();
        session()->flash('message', 'Notif has been sent to Staff');
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
    }
    public function render()
    {
        $notification = Notif::join('mom', 'mom.id', '=', 'notif.id_mom')
            ->join('users', 'users.id', '=', 'mom.id_users')
            ->join('staff', 'staff.id_users', '=', 'users.id')
            ->select('notif.*', 'mom.title_mom', 'staff.name')->paginate(5);


        return view('livewire.admin.data-notif', compact('notification'));
    }
}
