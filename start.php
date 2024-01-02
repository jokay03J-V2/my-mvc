<?php
// Check if config exist
if (!file_exists("./config.json")) {
    Line::yellow("You don't have a config file, is required to run.");
    Line::write("Create config ? yes/no:");
    if (filter_var(Line::prompt(), FILTER_VALIDATE_BOOLEAN)) {
        $example = file_get_contents("config.exemple.json");
        file_put_contents("config.json", $example);
    } else {
        Line::red("You must have a config file to run !");
        exit(1);
    }
}

Line::write("Use https ? yes/no:");
$useHttps = filter_var(Line::prompt(), FILTER_VALIDATE_BOOLEAN);
// Check if connection is open
$port = 3000;
$host = "localhost";
while (checkPort($host, $port)) {
    Line::yellow("Port " . $port . " is already used, try another.");
    $port++;
}

// Update config hostname
$olderConfig = file_get_contents("config.json");
$olderConfigConverted = json_decode($olderConfig, true);
$olderConfigConverted["ressources"]["hostname"] = $useHttps ? "https://" : "http://" . $host . ":" . $port;
$newConfig = json_encode($olderConfigConverted, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents("config.json", $newConfig);

// Start php server
exec("cd ./public && php -S " . $host . ":" . $port);
exec("cd ../");
Line::green("Server started at " . $host . ":" . $port);


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