<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NewUserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        // dd($user);
    }

    public function build()
    {
        return $this->view('mail.new_user_registered')
                    ->subject('Nieuwe gebruiker geregistreerd');
    }
}
