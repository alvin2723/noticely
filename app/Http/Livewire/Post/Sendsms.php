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

use function GuzzleHttp\json_encode;

class Sendsms extends Component
{
    public $number, $from, $to, $account_sid, $auth_token;
    // public function data(){
    //     $
    // }
    public function sendSMS()
    {
        // $twilio_whatsapp_number = "+14155238886";
        // $account_sid = "AC08c2c7ee68b10705b75da6838297338f";
        // $auth_token = "0a7a8885a5f5720a90f9ce0327753a64";
        // $data = json_encode(['x' => 1]);

        // $client = new Client($account_sid, $auth_token);
        // $message = "Your registration pin code is";
        // return $client->messages->create("whatsapp:+6285215000284", array('from' => "whatsapp:+6285156279328", 'body' => $message));

        // dd($response->getStatusCode);
        $json = [
            "token" => "69cc224c07d7ff60eef614d0b9a570c6",
            "source" =>  6285156279328,
            "destination" => 6281368433358,
            "type" => "text",
            "body" => [
                "text" => "Hello Word"
            ]
        ];
        echo json_encode($json);
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'http://waping.es/api/send', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => $json
        ]);
    }
    public function render()
    {


        return view('livewire.post.sendsms');
    }
}
