<?php

require_once  __DIR__ . '/../vendor/autoload.php';
Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

use RavenfallBridge\Ravenfall;
use RavenfallBridge\Authenticate;

$r = new Ravenfall();
$r->setUsername($_ENV['USER']);
$r->setPassword($_ENV['PASSWORD']);
// $r->Authenticate();

// $auth->State();

$auth = new Authenticate();
if(!$auth->State()) $r->Authenticate();

echo "do things" . PHP_EOL;

