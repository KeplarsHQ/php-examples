<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Keplars\Email\Client as KeplarsClient;
use Slim\Factory\AppFactory;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

$keplars = new KeplarsClient($_ENV['KEPLARS_API_KEY']);

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

require __DIR__ . '/../src/routes/emails.php';
require __DIR__ . '/../src/routes/webhooks.php';

$app->run();
