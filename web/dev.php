<?php

ini_set('display_errors', 1);

require_once __DIR__.'/../app/bootstrap.php';

/*
 * Register our App
 */
$app = new Frontend\App();

require __DIR__.'/../app/dev.config.php';

require __DIR__.'/../app/app.php';

$app->run();