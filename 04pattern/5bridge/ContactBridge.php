<?php

class ContactBridge
{
    /*
     * Exemple de situation :
     * Intéressant pour faire fonctionner ensemble deux bibliothèques qui ne se connaissent pas.
     */
    public function convert(ContactSource $source): ContactTarget
    {
        $names = explode(' ', $source->name);
        $target = new ContactTarget();
        $target->firstName = array_shift($names);
        $target->lastName = implode(' ', $names);

        return $target;
    }
}
