#!/usr/bin/php
<?php

require './Contact.php';

$contact  = new Contact();
$contact->setEmail('john.doe@example.com');
echo $contact->getEmail() . "\n";
try {
    $contact->email = 'bad email';
    $contact->setEmail('bad email');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . "\n";
} catch (Throwable $e) {
    echo $e->getMessage() . "\n";
}

echo $contact->getEmail() . "\n";
