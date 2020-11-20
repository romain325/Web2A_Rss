<?php

namespace Web2A\Utils;
require_once "Config.php";


class Utils{
    public static function checkConnected(string $redirectView){
        global $Views;
        if(!array_key_exists($redirectView,$Views)){
            $redirectView = "main";
        }
        session_start();
        if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){
            header("location: ".$Views[$redirectView]);
        }
    }

}