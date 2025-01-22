<?php

/*
 * Déclaration d'une classe avec le mot-clé class
 * Nom respectant la PSR-1 (StudlyCaps)
 */
class Contact
{
    /*
     * Définition d'une propriété
     * visibilité = private : ne sera accessible que depuis l'objet lui-même
     * type ?string = string|null
     * possibilité d'initialisé directement sur la ligne de définition
     *   => évite d'avoir à le faire dans __construct()
     */
    private ?string $name = null;
    private ?string $email = null;
    private ?string $phone = null;
    /*
     * Propriété de type Objet
     * On parle ici d'agrégation
     */
    private ?PostalAddressImmutable $address = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /*
     * Le fait d'avoir des attributs privés et de passer par des méthodes
     * permettent par exemple de faire de la validation de données
     */
    public function setEmail(?string $email): void
    {
        if ($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                /*
                 * Lancer une exception interrompt l'exécution du code
                 * L'exception pourra être attrapée dans la pile d'appel
                 */
                throw new InvalidArgumentException('Parameter must be a valid email address');
            }
        }

        $this->email = $email;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /*
     * L'encapsulation fonctionne toujours ici, car l'objet de type Address
     * ne peut être modifié en dehors de son constructeur
     */
    public function getAddress(): ?PostalAddressImmutable
    {
        return $this->address;
    }

    /*
     * Address implémente __toString et peut donc être retourné en tant que chaîne.
     */
    public function getAddressAsString(): ?string
    {
        return $this->address;
    }

    public function setAddress(?PostalAddressImmutable $address): void
    {
        $this->address = $address;
    }

}
