<?php

namespace App06\Validator;

class Violation
{
    public string $path;
    public string $message;

    /**
     * @param string $message
     * @param string $path
     */
    public function __construct(string $message, string $path)
    {
        $this->message = $message;
        $this->path = $path;
    }


}
