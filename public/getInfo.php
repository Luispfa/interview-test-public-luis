<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php';

use Controller\ProductController;

if (empty($_GET['reference'])) {
    header('HTTP/1.1 400 Bad Request');
    exit;
}

$productController = ServiceFactory::build(ProductController::class);
$productController->getInfoAction($_GET['reference']);


