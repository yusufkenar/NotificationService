<?php

namespace App\Library\Notification\Requests;

class TelegramRequest
{
    /**
     * @var null|string
     */
    private $to = "";

    /**
     * @var bool
     */
    private $isHtml = false;

    /**
     * @var null|string
     */
    private $content = "";

    /**
     * @var bool
     */
    private $isLocation = false;

    /**
     * @var null|string
     */
    private $lat = null;

    /**
     * @var null|string
     */
    private $long = null;

    /**
     * @var bool
     */
    private $hasAttachment = false;
    /**
     * @var TelegramAttachment
     */
    private $attachment;

    /**
     * @var bool
     */
    private $hasButton = false;

    /**
     * @var array
     */
    private $buttons = [];

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
     * @return bool
     */
    public function isHtml(): bool
    {
        return $this->isHtml;
    }

    /**
     * @param  bool  $isHtml
     */
    public function setIsHtml(bool $isHtml): void
    {
        $this->isHtml = $isHtml;
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

    /**
     * @return bool
     */
    public function isLocation(): bool
    {
        return $this->isLocation;
    }

    /**
     * @param  bool  $isLocation
     */
    public function setIsLocation(bool $isLocation): void
    {
        $this->isLocation = $isLocation;
    }

    /**
     * @return string|null
     */
    public function getLat(): ?string
    {
        return $this->lat;
    }

    /**
     * @param  string|null  $lat
     */
    public function setLat(?string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string|null
     */
    public function getLong(): ?string
    {
        return $this->long;
    }

    /**
     * @param  string|null  $long
     */
    public function setLong(?string $long): void
    {
        $this->long = $long;
    }

    /**
     * @return bool
     */
    public function hasAttachment(): bool
    {
        return $this->hasAttachment;
    }

    /**
     * @param  bool  $hasAttachment
     */
    public function setHasAttachment(bool $hasAttachment): void
    {
        $this->hasAttachment = $hasAttachment;
    }

    /**
     * @return TelegramAttachment
     */
    public function getAttachment(): TelegramAttachment
    {
        return $this->attachment;
    }

    /**
     * @param  TelegramAttachment  $attachment
     */
    public function setAttachment(TelegramAttachment $attachment): void
    {
        $this->attachment = $attachment;
    }

    /**
     * @return bool
     */
    public function hasButton(): bool
    {
        return $this->hasButton;
    }

    /**
     * @param  bool  $hasButton
     */
    public function setHasButton(bool $hasButton): void
    {
        $this->hasButton = $hasButton;
    }

    /**
     * @return array
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param  array  $buttons
     */
    public function setButtons(array $buttons): void
    {
        $this->buttons = $buttons;
    }

    public function addButton(TelegramButton $button) {
        $this->buttons[] = $button;
    }
}
