<?php 

function var_dump_pre($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

try {
    $config= parse_ini_file($_SERVER["DOCUMENT_ROOT"]."/.env");
    $pdo = new PDO("mysql:dbname={$config["db_database"]};host={$config["db_host"]}:{$config["db_port"]};charset=utf8mb4", $config["db_user"], $config["db_password"]);
} catch(Exception $e){
    die("Erreur : {$e -> getMessage()}");
}