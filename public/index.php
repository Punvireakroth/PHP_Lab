<?php


const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'core/function.php';

spl_autoload_register(function ($class) {
    // Change from core\class => core/class
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

$router = new \core\Router();


$routes = require base_path("routes.php");
// only pick the route not id
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, "GET");









