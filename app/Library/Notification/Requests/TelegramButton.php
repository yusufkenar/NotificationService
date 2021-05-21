<?php

namespace App\Library\Notification\Requests;

class TelegramButton
{
    private $text = null;
    private $url = null;

    /**
     * @return null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param  null  $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param  null  $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }
}
