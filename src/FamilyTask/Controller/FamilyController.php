<?php
namespace FamilyTask\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

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
    public function getAllAction(Request $request, Application $app)
    {
        $families = $app['orm.em']->getRepository('FamilyTask:Family')->findAll();
        return $app->json($families);
    }
}