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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'last_name' => $this->lastName,
            'first_name' => $this->firstName,
            'email' => $this->email,
            'phone' => $this->phone,
            'created_at' => $this->createdAt->format('c'),
        ];
    }
}
