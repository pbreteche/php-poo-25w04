<?php

class Logger
{
    private array $config;

    /*
     * Le constructeur nécessite des paramètres "complexes".
     * Afin d'éviter que chaque demande de nouvelle instance soit en charge de fournir les paramètres,
     * on délègue à une fabrique.
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }
}
