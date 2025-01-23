#!/usr/bin/php
<?php

use App03\Entity\Contact;
use App03\Entity\ContactList;
use App03\Entity\Customer;
use App03\Env;
use App03\Logger\Logger;

require_once __DIR__.'/../../vendor/autoload.php';

$logger = new Logger(new Env());

$customer = new Customer();
$customer->setName('John Doe');
$customer->setEmail('john@doe.com');
$customer->setVip(true);

$contact = new Contact();
$contact->setName('Jane Doe');

$list = new ContactList();
$list->push($customer);
$list->push($contact);

foreach ($list as $currentContact) {
    $logger->critical($currentContact->getName());
}

$logger->warning('Foo');
$logger->error('Bar');
