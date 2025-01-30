<?php

namespace App06;

use App06\Config\Config;
use App06\Database\ConnectionFactory;
use App06\Database\Contact;
use App06\Serializer\ContactNormalizer;
use App06\Serializer\CsvFormatter;
use App06\Validator\ContactValidator;
use Illuminate\Database\Capsule\Manager as Capsule;

class App
{
    private array $args;
    private readonly Capsule $capsule;
    private readonly CsvFormatter $formatter;
    private readonly ContactNormalizer $normalizer;
    private readonly ContactValidator $validator;

    public function __construct()
    {
        $this->args = $_SERVER['argv'];
        $this->capsule = ConnectionFactory::createConnection(Config::getConfig()->get('database'));
        $this->formatter = new CsvFormatter();
        $this->normalizer = new ContactNormalizer();
        $this->validator = new ContactValidator();
    }

    public function initialize(): self
    {
        if (!isset($this->args[1])) {
            throw new \InvalidArgumentException('Indiquer le chemin du fichier CSV à importer');
        }
        $userPath = $this->args[1];
        if (!file_exists($userPath) || !is_file($userPath) || pathinfo((string) $userPath, PATHINFO_EXTENSION) !== 'csv') {
            throw new \InvalidArgumentException(sprintf('%s doit être un fichier CSV', $userPath));
        }

        return $this;
    }

    public function run(): int
    {
        $rawData = $this->formatter->unFormat(file_get_contents($this->args[1]));
        $contacts = array_map(fn ($c) => $this->normalizer->denormalize($c), $rawData);
        $violations = [];
        foreach ($contacts as $contact) {
            $violations = array_merge($violations, $this->validator->validate($contact));
        }
        if (0 === count($violations)) {
            $this->capsule->getConnection()->table('contact')->insert(array_map(fn ($c) => $c->toArray(), $contacts));

            return 0;
        }

        foreach ($violations as $violation) {
            echo $violation->message.PHP_EOL;
        }

        return 1;
    }
}
