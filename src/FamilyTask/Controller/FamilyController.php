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
     * Create a family
     *
     * @param Request $request
     * @param Application $app
     */
    public function createAction(Request $request, Application $app)
    {
        var_dump($app['orm.em']); die;
        return 'hi';
    }
}