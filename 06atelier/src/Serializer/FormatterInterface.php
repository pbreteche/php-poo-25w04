<?php

namespace App06\Serializer;

interface FormatterInterface
{

    /**
     * @param array<mixed> $data
     */
    public function format(array $data): string;

    /**
     * @return array<mixed>
     */
    public function unFormat(string $stream): array;
}
