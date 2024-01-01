<?php
declare(strict_types=1);
require "../vendor/autoload.php";
// Set server default time zone
date_default_timezone_set("Europe/Paris");
// Start session
session_start();

// Load router
include("../router.php");
?>