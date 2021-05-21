<?php

namespace App\Library\Notification\Notifications;

use App\Library\Notification\Requests\TelegramRequest;
use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramLocation;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class TelegramNotification extends Notification
{
    use Queueable;

    /**
     * @var TelegramRequest
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
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        $telegramMessage = TelegramMessage::create();
        $telegramFile = TelegramFile::create();
        $telegramLocation = TelegramLocation::create();
        $telegramMessage->to($this->request->getTo());
        $telegramFile->to($this->request->getTo());
        $telegramLocation->to($this->request->getTo());

        $telegramMessage->content($this->request->getContent());
        $telegramFile->content($this->request->getContent());

        if (true === $this->request->isHtml()) {
            $telegramMessage->options(['parse_mode' => 'html']);
        }

        if (true === $this->request->isLocation()) {
            return $telegramLocation
                ->latitude($this->request->getLat())
                ->longitude($this->request->getLong());
        }

        if (true === $this->request->isPhoto()) {
            return $telegramFile->file($this->request->getDocument()->getUrl(),
                $this->request->getDocument()->getName());
        }

        if (true === $this->request->isVideo()) {
            return $telegramFile->file($this->request->getDocument()->getUrl(),
                $this->request->getDocument()->getName());
        }

        return TelegramMessage::create()
            ->to($this->data->to)
            ->options(['parse_mode' => 'html'])
            ->content($this->data->content);
    }
}
