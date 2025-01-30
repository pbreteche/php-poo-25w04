<?php

namespace App06\Config;

class Config
{
    private array $config;
    private static ?self $instance  = null;

    /**
     * @throws \Exception
     */
    private function __construct(array $config)
    {
        if (!isset($config['DATABASE_URL'])) {
            throw new \Exception('DATABASE_URL is not set');
        }
        $this->config['database'] = parse_url((string) $config['DATABASE_URL']);
    }

    /**
     * @throws \Exception
     */
    public static function getConfig(): ?self
    {
        if (!self::$instance instanceof self) {
            $elems = parse_ini_file(APP_PROJECT_ROOT.'/config.ini');
            self::$instance = new self($elems);
        }

        return self::$instance;
    }

    public function get(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }
}
