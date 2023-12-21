<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $feedback;

    public function __construct()
    {
        // $this->feedback = $feedback;
    }

    public function build()
    {
        return $this->view('dashboard.feedback');
    }
}
