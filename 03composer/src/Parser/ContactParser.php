<?php

namespace App03\Parser;

use App03\Entity\Contact;
use Psr\Log\LoggerInterface;

class ContactParser
{
    private LoggerInterface $logger;

    /*
     * Ici, notre objet "parser" nécessite un objet qui implément "LoggerInterface"
     * L'implémentation qui est utilisée aujourd'hui pourra être remplacée facilement
     * par une autre implémentation ultérieurement.
     *
     * On parle ici d'un "couplage faible", car le code de cette classe ne dépend pas
     * de la manière dont l'interface a été implémentée.
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return array<Contact>
     */
    public function parse(string $content): array
    {
        // le traitement
        $this->logger->info("Les contacts ont été correctement importés.");

        return [];
    }
}
