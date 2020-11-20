<?php
$rep=__DIR__.'/../';

//Of course those are not the real creds so don't spend time trying ;))
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
