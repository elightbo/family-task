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
        $family = $app['orm.em']->find('\\FamilyTask\\Entity\\Family', 1);
        var_dump($family); die;



        return 'hi';
    }
}