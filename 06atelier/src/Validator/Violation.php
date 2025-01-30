<?php

namespace App06\Validator;

class Violation
{
    /**
     * @param string $message
     * @param string $path
     */
    public function __construct(public string $message, public string $path)
    {
    }


}
