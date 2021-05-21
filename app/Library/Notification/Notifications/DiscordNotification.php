<?php

namespace App\Library\Notification\Notifications;

use App\Library\Notification\Constants\TelegramAttachmentType;
use App\Library\Notification\Requests\TelegramRequest;
use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramLocation;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class TelegramNotification extends Notification
{
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

        if (true === $this->request->hasAttachment()) {
            switch ($this->request->getAttachment()->getType()) {
                case TelegramAttachmentType::PHOTO:
                    return $telegramFile->photo($this->request->getAttachment()->getFile());
                case TelegramAttachmentType::VIDEO:
                    return $telegramFile->video($this->request->getAttachment()->getFile());
                case TelegramAttachmentType::ANIMATION:
                    return $telegramFile->animation($this->request->getAttachment()->getFile());
                case TelegramAttachmentType::AUDIO:
                    return $telegramFile->audio($this->request->getAttachment()->getFile());
                case TelegramAttachmentType::VOICE:
                    return $telegramFile->voice($this->request->getAttachment()->getFile());
                default:
                    return $telegramFile->document($this->request->getAttachment()->getFile(), $this->request->getAttachment()->getName());
            }
        }

        if (true === $this->request->hasButton() && $this->request->getButtons()) {
            foreach ($this->request->getButtons() as $button) {
                $telegramMessage->button($button->getText(), $button->getUrl());
            }
        }

        return $telegramMessage;
    }
}
