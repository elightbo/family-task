<?php
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application();

$app->register(new DoctrineServiceProvider, array(
    "db.options" => array(
        "driver" => "pdo_mysql",
        "user" => "root",
        "password" => "",
    ),
));

$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => __DIR__."/../src/FamilyTask/Proxy/",
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type" => "annotation",
                "namespace" => "FamilyTask\Entity",
                "path" => __DIR__."/../src/FamilyTask/Entity/",
            ),
        ),
    ),
));


$app['debug'] = true;

$app->post('/family', 'FamilyTask\Controller\FamilyController::createAction');

return $app;