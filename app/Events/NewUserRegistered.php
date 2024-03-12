<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserRegistered
{
    use Dispatchable, SerializesModels;

    public $token;
    public $title;
    public $body;
    public $user;

    public function __construct($user,$token, $title, $body)
    {
        $this->token = $token;
        $this->title = $title;
        $this->body = $body;
        $this->user = $user;
    }
}
