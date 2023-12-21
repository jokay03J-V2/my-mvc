<?php
declare(strict_types=1);
require "../vendor/autoload.php";
// Set server default time zone
date_default_timezone_set("Europe/Paris");
// Start session
session_start();
// Loads config
if (file_exists("../config.json")) {
    $routes = json_decode(file_get_contents("../config.json"), true);
    $configResult = array();
    foreach ($routes as $key => $value) {
        $configResult[$key] = $value;
    }
    define("CONFIG", $configResult);
    define("ROOT", "../");
    define("SRC", "src/");
} else {
    throw new Exception("You must have a config");
}

// Load router
include(ROOT . "./router.php");
?>