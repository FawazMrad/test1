<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\NotificationService;

class SendWelcomeNotification implements ShouldQueue
{
    public function handle(NewUserRegistered $event)
    {
        // Access notification data from the event
        $token = $event->token;
        $title = $event->title;
        $body = $event->body;

        // Access user data from the event
        $user = $event->user;
        $email = $user->email;

        // Send notification using the NotificationService
        NotificationService::sendNotification($token, $title, $body);
    }
}
