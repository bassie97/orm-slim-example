<?php
/**
 * Created by PhpStorm.
 * User: ruiter
 * Date: 1-3-2018
 * Time: 16:25
 */

namespace App\Controllers;
use App\AbstractResource;
use Slim\Views\Twig;

class ProductController extends AbstractResource
{
    protected $view;

    public function __construct(Twig $view) {
        $this->view = $view;
    }

    public function index($request, $response, $args){
        $products = $this->getEntityManager()->getRepository('App\Entities\Product')->findAll();
        if($products != null) {
            $args['result'] = $products;
        } else {
            $args['result'] = 'this shop is empty!';
        }
        $response = $this->view->render($response, 'shop.twig', $args);
        return $response;
    }

    public function show($request, $response, $args){
        $id = urlencode($args['id']);
        $product = $this->getEntityManager()->getRepository('App\Entities\Product')->find($id);

        if($product != null) {
            $result = array('product' => $product);
        } else {
            $result = array('size' => 0);
        }
        $response = $this->view->render($response, 'show.twig', $result);
        return $response;
    }

}