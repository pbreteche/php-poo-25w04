<?php

namespace App03;

class Env
{
    private array $config;

    public function __construct()
    {
        $this->config = array_merge(
            include __DIR__ . '/../.env.php',
            include __DIR__ . '/../.env.local.php',
        );
    }

    public function get(string $key)
    {
        return $this->config[$key];
    }
}
