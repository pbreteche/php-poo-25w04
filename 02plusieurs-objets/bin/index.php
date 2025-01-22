#!/usr/bin/php
<?php

/*
 * Fonction de chargement auto des définitions personnalisée.
 * Est ajouté à un registre de fonctions (une seule pour le moment)
 * Évite de faire les include à la main.
 */
spl_autoload_register(function ($class) {
    if (0 !== strpos($class, 'App\\')) {
        return false;
    }
    $class = substr($class, strlen('App\\'));
    $class = str_replace('\\', '/', $class);

    include __DIR__.'/../src/'.$class . '.php';

    return true;
});

use App\Loader\Connection;
use App\Loader\ProductLoader;

$pl1 = new \App\Loader\ProductLoader(new Connection());
$pl2 = new ProductLoader(new Connection());
$product = $pl2->loadById(123);
echo $product->getCurrency();

return 0;
