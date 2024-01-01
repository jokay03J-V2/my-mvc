<?php
use Project\Core\Router;

define("ROOT", str_replace("\\", "/", __DIR__));

// Loads config
if (file_exists(ROOT . "/config.json")) {
    $routes = json_decode(file_get_contents(ROOT . "/config.json"), true);
    $configResult = array();
    foreach ($routes as $key => $value) {
        $configResult[$key] = $value;
    }
    define("CONFIG", $configResult);
} else {
    throw new Exception("You must have a config");
}

// Instanciate router
$router = new Router();

try {
    // Check if route has controller
    $router->init();
} catch (Exception $e) {
    // Handle all errors
    echo $e->getMessage() . "</br>";
    echo $e->getTraceAsString();
}
?>