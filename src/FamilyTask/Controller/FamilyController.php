<?php
namespace FamilyTask\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Hateoas\Representation\CollectionRepresentation;
use Hateoas\Representation\PaginatedRepresentation;

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

        $families = new PaginatedRepresentation(
            new CollectionRepresentation($app['orm.em']->getRepository('FamilyTask:Family')->findAll()),
            'family_get', // route
            array(), // route parameters
            1, // page
            20, // limit
            4, // total pages
            'page',  // page route parameter name, optional, defaults to 'page'
            'limit' // limit route parameter name, optional, defaults to 'limit'
        );

        return new Response($app['serializer']->serialize($families, 'json'));

//        return new Response(
//            $app['serializer']->serialize(
//                new CollectionRepresentation($app['orm.em']->getRepository('FamilyTask:Family')->findAll()),
//                'json'
//            ));
    }
}