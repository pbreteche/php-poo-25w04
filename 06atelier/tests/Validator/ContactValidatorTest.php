<?php

namespace tests\Validator;

use App06\Database\Contact;
use App06\Validator\ContactValidator;
use PHPUnit\Framework\TestCase;

class ContactValidatorTest extends TestCase
{
    public function testValidate()
    {
        $validator = new ContactValidator();
        $contact = new Contact();
        $contact->email = 'test@test.com';
        $contact->firstName = 'Test';
        $contact->lastName = 'Test';

        $violations = $validator->validate($contact);

        $this->assertEquals(0, count($violations), 'On ne devrait pas avoir de violation de contrainte de validation.');

        $contact->firstName = null;

        $violations = $validator->validate($contact);
        $this->assertEquals(1, count($violations));
        $this->assertEquals('firstName', $violations[0]->path);

        $this->markTestIncomplete('This test should validate first name, last name and phone.');
    }
}
