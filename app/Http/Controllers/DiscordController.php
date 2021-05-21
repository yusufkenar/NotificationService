<?php

namespace App\Http\Controllers;

use App\Library\Notification\Facades\Notification;
use Illuminate\Http\Request;

class DiscordController
{
    public function send(Request $request)
    {
        return Notification::get('discord')->send($request);
    }
}
