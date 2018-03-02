<?php

$app->get('/', App\Controllers\HomeController::class . ':index');

$app->get('/shop', App\Controllers\ProductController::class . ':index');

$app->get('/product/{id}', App\Controllers\ProductController::class . ':show');

$app->get('/admin', App\Controllers\ProductController::class . ':adminIndex');
