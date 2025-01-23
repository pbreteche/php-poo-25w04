<?php

namespace App03\Entity;

use PostalAddressImmutable;

class Contact
{
    protected ?string $name = null;
    protected ?string $email = null;
    protected ?string $phone = null;

    protected ?PostalAddressImmutable $address = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        if ($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException('Parameter must be a valid email address');
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

    public function getAddress(): ?PostalAddressImmutable
    {
        return $this->address;
    }

    public function getAddressAsString(): ?string
    {
        return $this->address;
    }

    public function setAddress(?PostalAddressImmutable $address): void
    {
        $this->address = $address;
    }
}
