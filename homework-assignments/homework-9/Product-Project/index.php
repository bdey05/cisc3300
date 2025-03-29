<?php

require_once "./app/models/Model.php";
require_once "./app/models/Product.php";
require_once "./app/controllers/ProductController.php";

$env = parse_ini_file('./.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBPORT', $env['DBPORT']);

use app\controllers\ProductController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController = new ProductController();

    if ($id) {
        $productController->getProductByID($id);
    } else {
        $productController->getProducts();
    }
}


if ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $productController = new ProductController();

    if ($id) {
        $productController->productDetailsView();
    } else {
        $productController->productsView();
    }

}

include './app/views/notfound.html';
exit();

?>