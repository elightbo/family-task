<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->post('/family', 'FamilyTask\Controller\FamilyController::createAction');