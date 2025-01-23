<?php

namespace App03\Entity;

class ContactList implements \Iterator
{
    private array $contacts = [];
    private int $position = 0;

    public function push(Contact $contact)
    {
        $this->contacts[] = $contact;
    }

    public function current(): Contact
    {
        return $this->contacts[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->contacts[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
