#!/usr/bin/php
<?php

require __DIR__.'/PostalAddressImmutable.php';
require __DIR__.'/Contact.php';

$contact  = new Contact();
$contact->setEmail('john.doe@example.com');
$contact->setAddress(new PostalAddressImmutable(null, '44000'));
echo $contact->getEmail() . "\n";
try {
    // $contact->email = 'bad email';
    $contact->setEmail('bad email');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . "\n";
} catch (Throwable $e) {
    echo $e->getMessage() . "\n";
}

echo $contact->getEmail() . "\n";
echo $contact->getAddress() . "\n";
