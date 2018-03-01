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
        // your code here
        // use $this->view to render the HTML

        $response = $this->view->render($response, 'home.twig', $args);
        return $response;
    }
}