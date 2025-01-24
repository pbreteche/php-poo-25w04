<?php

namespace App06\Serializer;

interface FormatterInterface
{
    public function format(array $data): string;
    public function unFormat(string $stream): array;
}
