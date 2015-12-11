<?php
/*
 * Needed config file for doctrine cli
 */
$app = require_once __DIR__.'/../app/app.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($app['doctrine']->getManager());
