<?php

namespace App06\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class ConnectionFactory
{
    public static function createConnection(array $dsn): Capsule
    {
        $capsule = new Capsule();

        $capsule->addConnection([
            'driver' => $dsn['scheme'],
            'host' => $dsn['host'],
            'database' => ltrim((string) $dsn['path'], '/'),
            'username' => $dsn['user'],
            'password' => $dsn['pass'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();

        return $capsule;
    }
}
