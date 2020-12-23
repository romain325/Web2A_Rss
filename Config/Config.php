<?php

class Config {
    public static $MainDir=__DIR__.'/../';
    public static $ViewDir="View/";
    private static $AssetsDir="assets/";

    public static $nbPerPage = 9;

    public static $Repo="https://gitlab.iut-clermont.uca.fr/roolivier1/Web2A";

    public static $DBData = array(
        "User" => "rss",
        "Password" => "projetrss",
        "BaseName" => "projetrss",
        "Server" => "localhost"
    );


    public static $Views = array(
        "main" => 'main.php',
        "login" => 'login.php',
        "error" => 'erreur.php',
        "admin" => 'admin.php'
    );

    public static function getDSN() : string{
        return "mysql:host=".self::$DBData["Server"].";dbname=".self::$DBData["BaseName"].";";
    }

    public static function getView($name) : string{
        if(!array_key_exists($name,self::$Views)){
            $name = "main";
        }
        return self::$MainDir.self::$ViewDir.self::$Views[$name];
    }

    public static function getAssetsDir(){
        return self::$ViewDir.self::$AssetsDir;
    }
}

