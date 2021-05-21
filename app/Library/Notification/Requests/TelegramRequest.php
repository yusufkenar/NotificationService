<?php

namespace App\Library\Notification\Requests;

class TelegramRequest
{
    /**
     * @var null|string
     */
    private $to = null;

    /**
     * @var bool
     */
    private $isHtml = false;

    /**
     * @var null|string
     */
    private $content = null;

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
    private $isVideo = false;

    /**
     * @var null|string
     */
    private $video = null;

    /**
     * @var bool
     */
    private $isAnimation = false;

    /**
     * @var null|string
     */
    private $animation = null;

    /**
     * @var bool
     */
    private $isDocument = false;

    /**
     * @var TelegramDocument
     */
    private $document;

    /**
     * @var bool
     */
    private $isPhoto = false;

    /**
     * @var null|string
     */
    private $photo;

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
    public function isVideo(): bool
    {
        return $this->isVideo;
    }

    /**
     * @param  bool  $isVideo
     */
    public function setIsVideo(bool $isVideo): void
    {
        $this->isVideo = $isVideo;
    }

    /**
     * @return string|null
     */
    public function getVideo(): ?string
    {
        return $this->video;
    }

    /**
     * @param  string|null  $video
     */
    public function setVideo(?string $video): void
    {
        $this->video = $video;
    }

    /**
     * @return bool
     */
    public function isAnimation(): bool
    {
        return $this->isAnimation;
    }

    /**
     * @param  bool  $isAnimation
     */
    public function setIsAnimation(bool $isAnimation): void
    {
        $this->isAnimation = $isAnimation;
    }

    /**
     * @return string|null
     */
    public function getAnimation(): ?string
    {
        return $this->animation;
    }

    /**
     * @param  string|null  $animation
     */
    public function setAnimation(?string $animation): void
    {
        $this->animation = $animation;
    }

    /**
     * @return bool
     */
    public function isDocument(): bool
    {
        return $this->isDocument;
    }

    /**
     * @param  bool  $isDocument
     */
    public function setIsDocument(bool $isDocument): void
    {
        $this->isDocument = $isDocument;
    }

    /**
     * @return TelegramDocument
     */
    public function getDocument(): TelegramDocument
    {
        return $this->document;
    }

    /**
     * @param  TelegramDocument  $document
     */
    public function setDocument(TelegramDocument $document): void
    {
        $this->document = $document;
    }

    /**
     * @return bool
     */
    public function isPhoto(): bool
    {
        return $this->isPhoto;
    }

    /**
     * @param  bool  $isPhoto
     */
    public function setIsPhoto(bool $isPhoto): void
    {
        $this->isPhoto = $isPhoto;
    }

    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @param  string|null  $photo
     */
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
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
