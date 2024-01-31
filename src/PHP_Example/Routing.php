<?php

use PHP_Example\Repository\ProductRepository;
use PHP_Example\View\Home;
require 'Util/DatabaseConnector.php';


$routes = [];

function findView($path): void
{
    global $routes;
    $routes[$path['path']]($path);
}

$routes['/home'] = function($path) {
    $view = new Home(new ProductRepository(connect_db()));
    $view->process($path)->render();
};
