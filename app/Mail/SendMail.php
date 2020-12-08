<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Notif;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $akses = $this->from($this->data['admin_email'])->subject('New Minute of Meeting Approval Request')
            ->view('dynamic_email')->with('data', $this->data);


        session()->flash('message', 'Notif has been sent to Staff');
        return view('livewire.admin.data-notif');
    }
}
