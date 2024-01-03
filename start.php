#!/usr/bin/php
<?php
// Check if config exist
if (!file_exists("./config.json")) {
    Line::yellow("You don't have a config file, is required to run.");
    Line::write("Create config ? yes/no:");
    if (filter_var(Line::prompt(), FILTER_VALIDATE_BOOLEAN)) {
        $example = file_get_contents("config.example.json");
        file_put_contents("config.json", $example);
        Line::green("Config file was created successfully.");
        Line::yellow("You must override example data with your real data.");
    } else {
        Line::red("You must have a config file to run !");
        exit(1);
    }
}

// Check if connection is open
$port = 3000;
$host = "localhost";
while (checkPort($host, $port)) {
    Line::yellow("Port " . $port . " is already used, try another.");
    $port++;
}

// Start php server
Line::green("Starting php server at " . $host . ":" . $port);
exec("cd ./public && php -S " . $host . ":" . $port);
exec("cd ../");


function checkPort(string $host, int $port)
{
    $connection = @fsockopen($host, $port);
    if (is_resource($connection)) {
        fclose($connection);
        return true;
    } else {
        return false;
    }
}

class Line
{
    static function red(string $str)
    {
        echo "\e[31m" . $str . "\e[0m\n";
    }

    static function green(string $str)
    {
        echo "\e[32m" . $str . "\e[0m\n";
    }

    static function yellow(string $str)
    {
        echo "\e[93m" . $str . "\e[0m\n";
    }

    static function write(string $str)
    {
        echo "\e[39m" . $str . "\e[0m\n";
    }

    static function prompt()
    {
        $fin = fopen("php://stdin", "r");
        $line = fgets($fin);
        return $line;
    }
}
?>