<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $course;

    /**
     * Create a new message instance.
     */
    public function __construct(Participant $participant, Course $course)
    {
        $this->participant = $participant;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Course Enrollment Confirmation')
                    ->view('emails.confirmation', [
                        'participant' => $participant,
                        'course' => $course,
                    ]);
    }
}
