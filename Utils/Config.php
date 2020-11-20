<?php
$rep=__DIR__.'/../';

$DBData = array(
    "User" => "romain",
    "Password" => "romain",
    "BaseName" => "projetrss"
);
$DBData["dsn"] = "mysql:host=localhost;dbname=".$DBData["BaseName"];

$Views = array(
            "main" => 'index.php',
            "login" => 'login.php',
            "Err" => 'erreur.php',
            "404" => '404.php',
            "admin" => 'admin.php'
        );
