<?php
namespace FamilyTask\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Hateoas\Representation\Factory\PagerfantaFactory;
use Hateoas\Configuration\Route;


/**
 * Family controller
 *
 * Class FamilyController
 * @package FamilyTask\Shop\Controller
 */
class FamilyController
{

    /**
     * Get a single or list of families
     *
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getFamilies(Request $request, Application $app)
    {
        $queryBuilder = $app['orm.em']->createQueryBuilder()
            ->select('f')
            ->from('FamilyTask:Family', 'f');

        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pager = new Pagerfanta($adapter);
        $pagerfantaFactory = new PagerfantaFactory();

        $paginatedCollection = $pagerfantaFactory->createRepresentation(
            $pager,
            new Route('family_list', array())
        );

        return new Response($app['serializer']->serialize($paginatedCollection, 'json'), 200, [
            'content-type' => 'application/json'
        ]);
    }
}