<?php


const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'core/function.php';

spl_autoload_register(function ($class) {
    // Change from core\class => core/class
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

// instantiate router object
$router = new \core\Router();


// Below code will available in Router.php to use

require base_path("routes.php");

// only pick the route not id
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


// accept uri and display where it needs to go
$router->route($uri, $method);









