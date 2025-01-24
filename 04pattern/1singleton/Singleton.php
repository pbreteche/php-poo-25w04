<?php

/*
 * Principe : ne peut être instancié qu'une seule fois
 */
class Singleton
{
    private static $instance = null ;

    /*
     * Bloque l'instanciation via le mot clé "new"
     */
    private function __construct() {
    }

    public static function getInstance(): self {
        if(self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
