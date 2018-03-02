<?php

$app->get('/', App\Controllers\HomeController::class . ':index');

$app->get('/shop', App\Controllers\ProductController::class . ':index');

$app->get('/admin', App\Controllers\ProductController::class . ':adminIndex');

$app->group('/product', function () {
    $this->get   ('/{id}', App\Controllers\ProductController::class.':show');
    $this->post  ('',      App\Controllers\ProductController::class.':create');
    $this->put   ('/{id}', App\Controllers\ProductController::class.':update');
    $this->delete('/{id}', App\Controllers\ProductController::class.':delete');
});
