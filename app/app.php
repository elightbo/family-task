<?php
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Saxulum\DoctrineOrmManagerRegistry\Silex\Provider\DoctrineOrmManagerRegistryProvider;
use Saxulum\Console\Silex\Provider\ConsoleProvider;

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

$app->register(new ConsoleProvider());
$app->register(new DoctrineOrmManagerRegistryProvider());
$app->register(new Sorien\Provider\PimpleDumpProvider());

$app['serializer'] = $app->share(function () use ($app) {
    return Hateoas\HateoasBuilder::create()
        ->setDebug($app['debug'])
        ->build();
});

// @todo: define route for getting all available actions
$app->get('/families', 'FamilyTask\Controller\FamilyController::getFamilies');

return $app;