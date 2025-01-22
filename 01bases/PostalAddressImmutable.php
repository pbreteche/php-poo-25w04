<?php

/*
 * Les propriétés sont toutes privée et il n'y a aucun moyen de les modifier
 * via les méthodes (pas de mutateur, pas de retour par référence)
 */
class PostalAddressImmutable
{
    private ?string $street;
    private ?string $city;
    private ?string $postCode;

    public function __construct(string $city = null, string $postCode = null, string $street = null)
    {
        $this->city = $city;
        $this->postCode = $postCode;
        $this->street = $street;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function getCompleteAddress(): string
    {
        return implode(' ', array_filter([
            $this->street,
            $this->postCode,
            $this->city,
        ]));
    }

    /*
     * Appelé si on essaye d'utiliser l'objet en tant que chaîne.
     */
    public function __toString()
    {
        return $this->getCompleteAddress();
    }
}