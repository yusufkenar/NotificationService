<?php

namespace App\Library\Notification\Notifications;

use App\Library\Notification\Requests\DiscordRequest;
use NotificationChannels\Discord\DiscordChannel;
use NotificationChannels\Discord\DiscordMessage;
use Illuminate\Notifications\Notification;

class DiscordNotification extends Notification
{
    /**
     * @var DiscordRequest
     */
    protected $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function via($notifiable)
    {
        return [DiscordChannel::class];
    }

    public function toDiscord($notifiable)
    {
        return DiscordMessage::create($this->request->getContent());
    }
}
