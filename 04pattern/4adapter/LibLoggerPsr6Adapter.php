<?php

use Psr\Log\LoggerInterface;

class LibLoggerPsr6Adapter implements LoggerInterface
{
    private LibLogger $logger;

    public function __construct(LibLogger $logger)
    {
        $this->logger = $logger;
    }

    public function emergency($message, array $context = array())
    {
        $this->logger->writeLog($message, 'emergency');
    }

    [...]
}
