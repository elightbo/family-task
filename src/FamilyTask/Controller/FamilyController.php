<?php
namespace FamilyTask\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Hateoas\Representation\CollectionRepresentation;

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
        return new Response(
            $app['serializer']->serialize(
                new CollectionRepresentation($app['orm.em']->getRepository('FamilyTask:Family')->findAll()),
                'json'
            ));
    }
}