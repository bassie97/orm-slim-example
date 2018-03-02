<?php
/**
 * Created by PhpStorm.
 * User: ruiter
 * Date: 1-3-2018
 * Time: 11:52
 */

namespace App\Controllers;
use App\AbstractResource;
use Slim\Views\Twig;

class HomeController extends AbstractResource
{
    protected $view;

        public function __construct(Twig $view) {
        $this->view = $view;
    }

    public function index($request, $response, $args){
        //get the entitymanager
        //get the needed entity
        //findBy specific terms
        $products = $this->getEntityManager()->getRepository('App\Entities\Product')->findBy(array(), array('id' => 'DESC'),3);
        $response = $this->view->render($response, 'home.twig', array(
            "products" => $products
        ));
        return $response;
    }
}
