<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Predis\Client;

$redis = new Client([
    'scheme' => 'tcp',
    'host' =>  'redis',
    'port' => 6379,
]);