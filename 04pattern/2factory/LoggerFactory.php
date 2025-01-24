<?php

class LoggerFactory
{
    public function createLogger(): Logger
    {
        // tout le pré-traitement, par exemple le chargement de la config
        $config = [];

        return new Logger($config);
    }
}
