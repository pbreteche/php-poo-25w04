<?php

namespace App\Loader;

// FQCN Full Qualified Class Name = App\ProductLoader
use App\Model\Product;

class ProductLoader
{
    /*
     * Aggrégation de la connection. L'objet interne est utilisé en tant que propriété
     * de l'objet externe.
     */
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /*
     * Association simple. L'objet ProductLoader manipule l'objet Product.
     * Une évolution de l'interface (nom de méthode, paramètre, type de retour)
     * de l'objet product impactera ProductLoader.
     */
    public function loadById(int $id): Product
    {
        $product = new Product();
        $product->id = $id;
        $product->name = 'PHP Training';
        $product->price = 200000;
        $product->setCurrency('EUR');

        return $product;
    }
}