<?php

namespace App\Library\Notification\Requests;

class TelegramFile
{
    private $name = "";
    private $extension = "";
    private $type = "";
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
            case "mp3":
                return "audio";
            case "ogg":
                return "voice";
            case "png":
            case "jpg":
            case "jpeg":
                return "photo";
            case "gif":
                return "animation";
            default:
                return "document";
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
