#!/usr/bin/php
<?php

use App03\Env;
use App03\Logger\Logger;

require_once __DIR__.'/../../vendor/autoload.php';

$logger = new Logger(new Env());

// add records to the log
$logger->warning('Foo');
$logger->error('Bar');
