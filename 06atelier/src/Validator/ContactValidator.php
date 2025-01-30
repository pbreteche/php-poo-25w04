<?php

namespace App06\Validator;

use App06\Database\Contact;

class ContactValidator
{
    /**
     * @return array<Violation>
     */
    public function validate(Contact $contact): array
    {
        $violations = [];
        if (empty($contact->firstName)) {
            $violations[] = new Violation('Veuillez renseigner le prénom', 'firstName');
        }
        if (empty($contact->lastName)) {
            $violations[] = new Violation('Veuillez renseigner le prénom', 'firstName');
        }
        if ($contact->phone && !preg_match('/^\+\d{11}/', $contact->phone)) {
            $violations[] = new Violation('Le numéro de téléphone est invalid', 'phone');
        }

        return $violations;
    }
}
