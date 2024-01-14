<?php


const BASE_PATH = __DIR__ . "/../";


require BASE_PATH . 'core/function.php';


spl_autoload_register(function ($class) {
    // Change from core\class => core/class
    $class = str_replace("\\", "/", $class);

    require base_path("{$class}.php");
});

require base_path("core/router.php");









