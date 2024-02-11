<?php
declare(strict_types=1);

use PHP_Example\Repository\CouponRepository;
use PHP_Example\Repository\ProductRepository;
use PHP_Example\Service\ProductService;
use PHP_Example\View\BillView;

require 'Util/DatabaseConnector.php';


$routes = [];

/**
 * Find the matching view and run it.
 * It will give it a database connection,
 * but close the connection after processing has finished.
 * @param array $path The HTTP request
 * @return void
 */
function findView(array $path): void
{
    global $routes;
    $conn = connect_db();
    $routes[$path['path']]($path, $conn);
    $conn->close();
}

// Here we're adding a view to the application.
$routes['/bill'] = function (array $path, mysqli $conn) {
    $view = new BillView(new ProductService(new ProductRepository($conn), new CouponRepository($conn)));
    $view->process($path)->render();
};
