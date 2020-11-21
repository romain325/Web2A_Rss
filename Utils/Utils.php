<?php

namespace Web2A\Utils;


use Config;

class Utils{
    public static function checkConnected(string $redirectView){
        if(!array_key_exists($redirectView, Config::$Views)){
            $redirectView = "main";
        }
        if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true){
            header("location: ./?page=admin");
        }
    }

    public static function ejectNotConnected(){
        if(!isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] !== true){
            header("location: ./?page=login");
        }
    }

}