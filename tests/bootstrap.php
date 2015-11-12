<?php
$app = require_once __DIR__.'/../app/bootstrap.php';
$app['debug'] = true;
unset($app['exception_handler']);