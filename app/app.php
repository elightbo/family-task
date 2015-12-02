<?php
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

$loader = require __DIR__ . '/../vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$app = new Application();
$app['debug'] = true;

$app->register(new DoctrineServiceProvider, [
    "db.options" => [
        "driver" => "pdo_mysql",
        "user" => "root",
        "password" => "",
        "dbname" => "familytask",
    ],
]);

$app->register(new DoctrineOrmServiceProvider, [
    "orm.proxies_dir" => __DIR__ . "/../src/FamilyTask/Proxy/",
    "orm.em.options" => [
        "mappings" => [
            [
                "alias" => "FamilyTask",
                "type" => "annotation",
                "use_simple_annotation_reader" => false,
                "namespace" => "FamilyTask\\Entity",
                "path" => __DIR__ . "/../src/FamilyTask/Entity",
            ],
        ],
    ],
]);

$app->register(new Sorien\Provider\PimpleDumpProvider());

$app->post('/family', 'FamilyTask\Controller\FamilyController::createAction');

return $app;