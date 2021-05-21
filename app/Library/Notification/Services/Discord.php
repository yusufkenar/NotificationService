<?php

namespace App\Library\Notification\Services;

use App\Library\Notification\Contracts\NotificationServiceContract;
use App\Library\Notification\Exceptions\DiscordFormException;
use App\Library\Notification\Notifications\DiscordNotification;
use App\Library\Notification\Requests\DiscordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class Discord implements NotificationServiceContract
{
    public function send(Request $request)
    {
        try {
            $discordRequest = $this->validate($request);
            Notification::route('discord', $discordRequest->getTo())->notify(new DiscordNotification($discordRequest));

            return successResponse([], 'Success!');
        } catch (\Exception $exception) {
            $reflector = new \ReflectionClass($exception);

            return errorResponse($exception->getMessage(), $reflector->getShortName(), ($exception->getCode()) ?: 422);
        }
    }

    public function validate(Request $request)
    {
        $discordRequest = new DiscordRequest();

        if (!$request->has('to') || !$request->input('to')) {
            throw new DiscordFormException('to is empty', 422);
        } else {
            $discordRequest->setTo($request->input('to'));
        }

        if (!$request->has('content') || !$request->input('content')) {
            throw new DiscordFormException('content is empty', 422);
        } else {
            $discordRequest->setContent($request->input('content'));
        }

        return $discordRequest;
    }
}
