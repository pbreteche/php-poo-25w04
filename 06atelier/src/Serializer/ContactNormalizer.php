<?php

namespace App06\Serializer;

use App06\Database\Contact;

class ContactNormalizer
{
    public function denormalize(array $contact): Contact
    {
        $cObject = new Contact();
        $cObject->lastName = $contact['last_name'];
        $cObject->firstName = $contact['first_name'];
        $cObject->email = $contact['email'];
        $cObject->phone = $contact['phone'];
        $cObject->createdAt = $contact['created_at'] ? new \DateTimeImmutable($contact['created_at']) : null;

        return $cObject;
    }
}
