<?php

use PHP_Example\Repository\CouponRepository;
use PHP_Example\Repository\ProductRepository;
use PHP_Example\Service\ProductService;
use PHP_Example\View\Home;

require 'Util/DatabaseConnector.php';


$routes = [];

function findView(array $path): void
{
    global $routes;
    $conn = connect_db();
    $routes[$path['path']]($path, $conn);
    $conn->close();
}

$routes['/home'] = function (array $path, mysqli $conn) {
    $view = new Home(new ProductService(new ProductRepository($conn), new CouponRepository($conn)));
    $view->process($path)->render();
};
