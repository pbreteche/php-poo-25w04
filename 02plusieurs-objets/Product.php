<?php

class Product
{
    public ?int $id = null;
    public ?string $name = null;
    public ?int $price = null;
    /*
     * Cette association est aggrégation forte (ou composition).
     * La référence vers l'objet interne n'existe qu'au sein de l'objet externe.
     * L'objet externe a le contrôle total sur le cycle de vie de l'objet interne.
     */
    private ?CurrencyEnum $currency = null;

    public function getCurrency(): ?string
    {
        return $this->currency->getValue();
    }

    public function setCurrency(?string $currency): Product
    {
        $this->currency = new CurrencyEnum($currency);

        return $this;
    }
}
