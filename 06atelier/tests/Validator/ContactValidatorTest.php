<?php

namespace tests\Validator;

use App06\Database\Contact;
use App06\Validator\ContactValidator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App06\Database\Contact
 */
class ContactValidatorTest extends TestCase
{
    public function testValidateSuccess()
    {
        $validator = new ContactValidator();
        $contact = new Contact();
        $contact->email = 'test@test.com';
        $contact->firstName = 'Test';
        $contact->lastName = 'Test';

        $violations = $validator->validate($contact);

        $this->assertEquals(0, count($violations), 'On ne devrait pas avoir de violation de contrainte de validation.');
    }

    /**
     * @dataProvider failureContactDataProvider
     */
    public function testValidateFailure(Contact $contact, string $path)
    {
        $validator = new ContactValidator();

        $violations = $validator->validate($contact);
        $this->assertEquals(1, count($violations));
        $this->assertEquals($path, $violations[0]->path);
    }

    public function failureContactDataProvider(): array
    {
        $c1 = new Contact();
        $c1->email = 'test@test.com';
        $c1->lastName = 'Test';

        $c2 = new Contact();
        $c2->email = 'test@test.com';
        $c2->firstName = 'Test';

        return [
            [$c1, 'firstName'],
            [$c2, 'lastName'],
        ];
    }
}
