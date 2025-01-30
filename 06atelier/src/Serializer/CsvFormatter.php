<?php

namespace App06\Serializer;

class CsvFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        $str = fopen('php://temp', 'r+');
        if ($str === false) {
            throw new \RuntimeException('Unable to open temp file');
        }
        foreach ($data as $row) {
            fputcsv($str, $row);
        }
        rewind($str);

        return stream_get_contents($str);
    }

    public function unFormat(string $stream): array
    {
        $str = fopen('php://temp', 'r+');
        fwrite($str, $stream);
        rewind($str);
        $data = [];
        while (!feof($str)) {
            $data[] = array_combine(['last_name', 'first_name', 'email', 'phone', 'created_at'], fgetcsv($str));
        }

        return $data;
    }
}
