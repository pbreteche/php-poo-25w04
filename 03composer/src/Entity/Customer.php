<?php

namespace App03\Entity;

use App03\Entity\Contact;

class Customer extends Contact
{
    private bool $vip = false;

    public function isVip(): bool
    {
        return $this->vip;
    }

    public function setVip(bool $vip): Customer
    {
        $this->vip = $vip;

        return $this;
    }

    /*
     * Possibilité de redéfinir une méthode de la classe parente.
     */
    public function getName(): string
    {
        return ($this->vip ? "VIP " : ''). parent::getName();
    }
}
