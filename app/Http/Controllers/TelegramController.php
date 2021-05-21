<?php

namespace App\Http\Controllers;

use App\Library\Notification\Facades\Notification;
use Illuminate\Http\Request;

class TelegramController
{
    public function send(Request $request)
    {
        return Notification::get('telegram')->send($request);
    }
}
