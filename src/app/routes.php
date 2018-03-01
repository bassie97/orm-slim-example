<?php
use App\Resource\CustomerResource;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$customerResource = new CustomerResource();
//$app->get('/customer/:id', function (Request $request, Response $response, array $args) use ($customerResource) {
//    // Sample log message
//    $this->logger->info($customerResource->get(1));
//
//    // Render index view
//    echo $customerResource->get(1);
//});});



//$app->get('/customer/:id', function($id = null) use ($customerResource) {
//    $this->logger->info($customerResource->get($id));
//    echo $customerResource->get($id);
//});

//$app->get('/customer/{id}', function($id) use ($customerResource) {
//    $param = $this->app->request->get();
//    echo "The first parameter is " . $param;
//});

//$app->get('/', function ($request, $response) {
//    return $this->view->render($response, 'home.twig');
//});

//$app->get('/customer/{id}', function ($request, $response, $args) use ($customerResource) {
//    echo $customerResource->get($args['id']);
//});
//
//$app->get('/customer/', function ($request, $response, $args) use ($customerResource) {
//    echo $customerResource->get(null);
//

$app->get('/{id}', App\Controllers\HomeController::class . ':home');

//$app->get('/customer', App\Controllers\CustomerController::class . ':index');
//
//$app->get('/customer/{id}', App\Controllers\CustomerController::class . ':show');
