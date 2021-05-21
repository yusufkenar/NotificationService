<?php

namespace App\Library\Notification\Providers;


use App\Library\Notification\Facades\Notification;
use App\Library\Notification\Services\Slack;
use App\Library\Notification\Services\Telegram;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerTelegram();
        $this->registerDiscord();
        $this->registerSlack();
    }

    private function registerTelegram()
    {
        Notification::register('telegram', new Telegram());
    }

    private function registerDiscord()
    {
        Notification::register('telegram', new Telegram());
    }

    private function registerSlack()
    {
        Notification::register('slack', new Slack());
    }
}
