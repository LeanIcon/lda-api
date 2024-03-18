<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyNotificationEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $participant;
    public $course;
    public $companyEmail;


    /**
     * Create a new message instance.
     */
    public function __construct(Participant $participant, Course $course, $companyEmail)
    {
        $this->participant = $participant;
        $this->course = $course;
        $this->companyEmail = $companyEmail;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.company_notification')
                    ->with([
                        'participant' => $participant,
                        'course' => $course,
                    ]);
    }

}
