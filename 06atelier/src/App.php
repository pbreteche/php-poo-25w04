<?php

namespace App06;

use App06\Config\Config;
use App06\Database\ConnectionFactory;
use App06\Serializer\CsvFormatter;
use Illuminate\Database\Capsule\Manager as Capsule;

class App
{
    private array $args;
    private Capsule $capsule;
    private CsvFormatter $formatter;

    public function __construct()
    {
        $this->args = $_SERVER['argv'];
        $this->capsule = ConnectionFactory::createConnection(Config::getConfig()->get('database'));
        $this->formatter = new CsvFormatter();
    }

    public function initialize(): self
    {
        if (!isset($this->args[1])) {
            throw new \InvalidArgumentException('Indiquer le chemin du fichier CSV à importer');
        }
        $userPath = $this->args[1];
        if (!file_exists($userPath) || !is_file($userPath) || pathinfo($userPath, PATHINFO_EXTENSION) !== 'csv') {
            throw new \InvalidArgumentException(sprintf('%s doit être un fichier CSV', $userPath));
        }

        return $this;
    }

    public function run(): int
    {

        $data = $this->formatter->unFormat(file_get_contents($this->args[1]));
        $this->capsule->getConnection()->table('contact')->insert($data);

        return 0;
    }
}
