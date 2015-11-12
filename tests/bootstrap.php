<?php
require_once __DIR__.'/../app/bootstrap.php';

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('FamilyTask\\Test\\', __DIR__);

$app['debug'] = true;
unset($app['exception_handler']);