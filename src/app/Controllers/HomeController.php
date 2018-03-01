<?php
/**
 * Created by PhpStorm.
 * User: ruiter
 * Date: 1-3-2018
 * Time: 11:52
 */

namespace App\Controllers;
use Slim\Views\Twig;

class HomeController
{
    protected $view;

        public function __construct(Twig $view) {
        $this->view = $view;
    }

    public function home($request, $response, $args) {
        $response = $this->view->render($response, 'home.twig', $args);
        return $response;
    }

    public function login($request, $response, $args) {
        $args['name'] = $_POST['fullname'];
        $_SESSION = $_POST['fullname'];
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
}
