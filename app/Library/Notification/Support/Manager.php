<?php

namespace App\Library\Notification\Support;

abstract class Manager
{
    private $providers = [];

    public function all()
    {
        return collect($this->providers);
    }

    public function names()
    {
        return array_keys($this->providers);
    }

    public function get($name)
    {
        return array_get($this->providers, $name);
    }

    public function register($name, $provider)
    {
        $this->providers[$name] = is_callable($provider) ? call_user_func($provider) : $provider;

        return $this;
    }

    public function count()
    {
        return count($this->providers);
    }

    public function isEmpty()
    {
        return empty($this->providers);
    }

    public function isNotEmpty()
    {
        return !$this->isEmpty();
    }
}
