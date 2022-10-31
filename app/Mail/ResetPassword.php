<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *@param  \App\Models\User  $order
     *
     * @return void
     */
    /**
     * The order instance.
     *
     * @var \App\Models\User
     */
    public $pin;
    public $user;
    public function __construct(User $user, $pin)
    {
       $this->pin = $pin;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Reset Password")->markdown('emails.password');
    }
}
