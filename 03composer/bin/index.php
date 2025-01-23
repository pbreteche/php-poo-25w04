#!/usr/bin/php
<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once __DIR__.'/../../vendor/autoload.php';
const LOG_PATH = __DIR__.'/../logs/error.log';

$logger = new Logger('logger');
$logger->pushHandler(new StreamHandler(LOG_PATH, Logger::WARNING));

// add records to the log
$logger->warning('Foo');
$logger->error('Bar');
