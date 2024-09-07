<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Student;


class ReturnMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
            }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $student = Student::first();

        // return $this->view('view.name');
        return $this->subject('University Of Baltistan Alert Mail')->view('admin.views.email.mymail', compact('student'));

    }
}
