<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/app/settings.php';
$app = new \Slim\App($settings);

$container = $app->getContainer();

$container['view'] = function ($container) {
    $templates = __DIR__ . '/Templates/';

    $view = new Slim\Views\Twig($templates);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

//define the controllers
$container[App\Controllers\HomeController::class] = function ($container) {
    return new App\Controllers\HomeController($container->get('view'), $container->get('logger'));
};

$container[App\Controllers\ProductController::class] = function ($container) {
    return new App\Controllers\ProductController($container->get('view'), $container->get('logger'));
};

$container[App\Controllers\AdminController::class] = function ($container) {
    return new App\Controllers\ProductController($container->get('view'), $container->get('logger'));
};

// Set up dependencies
require __DIR__ . '/../src/app/dependencies.php';

// Register middleware
require __DIR__ . '/../src/app/middleware.php';

// Register routes
require __DIR__ . '/../src/app/routes.php';

// Run app
$app->run();
