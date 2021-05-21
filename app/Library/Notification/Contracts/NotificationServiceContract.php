<?php

namespace App\Library\Notification\Contracts;

use Illuminate\Http\Request;

interface NotificationServiceContract
{
    public function send(Request $request);

    public function validate(Request $request);
}
