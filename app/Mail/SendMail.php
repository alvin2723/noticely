<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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

        // $akses = $this->from($this->data['staff_email'])->subject('New Minute of Meeting Approval Request')
        //         ->view('dynamic_email')->with('data', $this->data);
        $akses = $this->from('alvinjulian62@gmail.com')->subject('New Minute of Meeting Approval Request')
            ->view('dynamic_email')->with('data', $this->data);

        return view('livewire.post.draft-mom');
    }
}
