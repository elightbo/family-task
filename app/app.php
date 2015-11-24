<?php
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();
$app['debug'] = true;

$app->register(new DoctrineServiceProvider, [
    "db.options" => [
        "driver" => "pdo_mysql",
        "user" => "root",
        "password" => "",
    ],
]);

$app->register(new DoctrineOrmServiceProvider, [
    "orm.proxies_dir" => __DIR__ . "/../src/FamilyTask/Proxy/",
    "orm.em.options" => [
        "mappings" => [
            [
                "type" => "annotation",
                "namespace" => "FamilyTask\\Entity",
                "path" => __DIR__ . "/../src/FamilyTask/Entity",
            ],
        ],
    ],
]);

$app->post('/family', 'FamilyTask\Controller\FamilyController::createAction');

return $app;