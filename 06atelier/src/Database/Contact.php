<?php

namespace App06\Database;

class Contact
{
    public ?int $id = null;
    public ?string $lastName = null;
    public ?string $firstName = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?\DateTimeImmutable $createdAt = null;
}
