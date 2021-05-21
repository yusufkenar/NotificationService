<?php

namespace App\Library\Notification\Services;

use App\Library\Notification\Contracts\NotificationServiceContract;
use App\Library\Notification\Exceptions\TelegramFormException;
use App\Library\Notification\Notifications\TelegramNotification;
use App\Library\Notification\Requests\TelegramAttachment;
use App\Library\Notification\Requests\TelegramButton;
use App\Library\Notification\Requests\TelegramRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class Telegram implements NotificationServiceContract
{
    public function send(Request $request)
    {
        try {
            $telegramRequest = $this->validate($request);
            Notification::route('telegram', '')->notify(new TelegramNotification($telegramRequest));

            return successResponse([], 'Success!');
        } catch (\Exception $exception) {
            $reflector = new \ReflectionClass($exception);

            return errorResponse($exception->getMessage(), $reflector->getShortName(), ($exception->getCode()) ?: 422);
        }
    }

    /**
     * @param  Request  $request
     * @return TelegramRequest
     * @throws TelegramFormException
     */
    public function validate(Request $request)
    {
        $telegramRequest = new TelegramRequest();

        if (!$request->has('to') || !$request->input('to')) {
            throw new TelegramFormException('to is empty', 422);
        } else {
            $telegramRequest->setTo($request->input('to'));
        }

        if ($request->input('content')) {
            $telegramRequest->setContent($request->input('content'));
        }

        if ($request->input('lat') && $request->input('long')) {
            $telegramRequest->setIsLocation(true);
            $telegramRequest->setLat($request->input('lat'));
            $telegramRequest->setLong($request->input('long'));
        }

        if ($request->has('isHtml') && true == boolval($request->input('isHtml'))) {
            $telegramRequest->setIsHtml(true);
        }

        if ($request->input('attachment') || $request->file('attachment')) {
            $telegramAttachment = new TelegramAttachment();

            if ($request->file('attachment')) {
                $attachmentInfo = $request->file('attachment');
                $telegramAttachment->setName($attachmentInfo->getClientOriginalName());
                $telegramAttachment->setExtension($attachmentInfo->getClientOriginalExtension());
                $telegramAttachment->setFile($attachmentInfo);
            } else {
                $attachmentInfo = pathinfo($request->input('attachment'));
                $telegramAttachment->setName((isset($attachmentInfo['basename'])) ? $attachmentInfo['basename'] : 'filename.xxx');
                $telegramAttachment->setExtension((isset($attachmentInfo['extension'])) ? $attachmentInfo['extension'] : 'xxx');
                $telegramAttachment->setFile($request->input('attachment'));
            }

            $telegramRequest->setHasAttachment(true);
            $telegramRequest->setAttachment($telegramAttachment);
        }

        if ($request->has('buttons') && $request->input('buttons') && is_array($request->input('buttons'))) {
            $telegramRequest->setHasButton(true);

            foreach ($request->input('buttons') as $button) {
                if (isset($button['text']) && isset($button['url'])) {
                    $telegramButton = new TelegramButton();
                    $telegramButton->setText($button['text']);
                    $telegramButton->setUrl($button['url']);

                    $telegramRequest->addButton($telegramButton);
                }
            }
        }

        return $telegramRequest;
    }
}
