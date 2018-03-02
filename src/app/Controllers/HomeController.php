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
use App\Entities\product;

class HomeController extends AbstractResource
{
    protected $view;

        public function __construct(Twig $view) {
        $this->view = $view;
    }

    public function index($request, $response, $args){
        $products = $this->getEntityManager()->getRepository('App\Entities\Product')->findBy(array(), array('id' => 'DESC'),3);
        $response = $this->view->render($response, 'home.twig', array(
            "products" => $products
        ));
        return $response;
    }

    public function login($request, $response, $args) {
        $args['name'] = $_POST['fullname'];
        if ($args['name'] == 'admin')
            $response = $this->view->render($response, 'admin.twig', $args);
        else
            $response = $this->view->render($response, 'shop.twig', $args);

        return $response;
    }

    public function logout($request, $response, $args) {
        $_POST = null;
        $response = $this->view->render($response, 'home.twig', $args);

        return $response;
    }

    private function convertToArray(Product $product) {
        return array(
            'id' => $product->getId(),
            'name' => $product->getName()
        );
    }
}
