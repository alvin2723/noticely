<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Nexmo\Laravel\Facade\Nexmo;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewSaleOccurred;
use App\Notifications\NewSms;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use function GuzzleHttp\json_encode;

class Sendsms extends Component
{
    public $number, $from, $to, $account_sid, $auth_token;
    public function sendData($json)
    {
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'http://waping.es/api/send', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => $json
        ]);
    }
    public function sendSMS()
    {

        $json = [
            "token" => "69cc224c07d7ff60eef614d0b9a570c6",
            "source" =>  6285156279328,
            "destination" => 6285156279328,
            "type" => "text",
            "body" => [
                "text" => "Hello Word"
            ]
        ];
        $this->sendData($json);
        $json = [
            "token" => "69cc224c07d7ff60eef614d0b9a570c6",
            "source" =>  6285156279328,
            "destination" => 6281368433358,
            "type" => "text",
            "body" => [
                "text" => "Hello Word"
            ]
        ];


        $this->sendData($json);
    }
    public function render()
    {
        return view('livewire.post.sendsms');
    }
}
