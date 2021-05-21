<?php

namespace App\Library\Notification\Requests;

class DiscordRequest
{
    /**
     * @var null|string
     */
    private $to = "";

    /**
     * @var null|string
     */
    private $content = "";

    /**
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }

    /**
     * @param  string|null  $to
     */
    public function setTo(?string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param  string|null  $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }
}
