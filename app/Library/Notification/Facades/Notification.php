<?php

namespace App\Library\Notification\Facades;

use App\Library\Notification\Services\NotificationService;
use Illuminate\Support\Facades\Facade;

class Notification extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return NotificationService::class;
    }
}
