<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetFlutter extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verification;
    public function __construct(User $user, $verification)
    {
      $this->user = $user;
      $this->verification = $verification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Email.password_reset_flutter');
    }
}
