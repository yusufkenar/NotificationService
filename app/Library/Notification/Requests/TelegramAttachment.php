<?php

namespace App\Library\Notification\Requests;

use App\Library\Notification\Constants\TelegramAttachmentType;

class TelegramAttachment
{
    private $name = "";
    private $extension = "";
    private $file = "";

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string  $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param  string  $extension
     */
    public function setExtension(string $extension): void
    {
        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        switch ($this->extension) {
            case "mp4":
                return TelegramAttachmentType::VIDEO;
            case "mp3":
                return TelegramAttachmentType::AUDIO;
            case "ogg":
                return TelegramAttachmentType::VOICE;
            case "png":
            case "jpg":
            case "jpeg":
                return TelegramAttachmentType::PHOTO;
            case "gif":
                return TelegramAttachmentType::ANIMATION;
            default:
                return TelegramAttachmentType::DOCUMENT;
        }
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param  string  $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }
}
