<?php

include __DIR__ . "/../vendor/autoload.php";
$settings = include __DIR__ . "/../app/config/settings.php";

$app = new \Slim\App($settings);

include __DIR__ . "/../app/config/dependencies.php";
include __DIR__ . "/../app/config/routes.php";

$app->run();
