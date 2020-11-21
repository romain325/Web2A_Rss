<?php

namespace Web2A\Utils;

use DateTime;
use Exception;

class Verification {

    public static function verifDbConnect($dsn, $username, $password) : bool {
        return self::verifDSN($dsn) && (!empty($password)) && (!empty($username));
    }

    private static function verifDSN($dsn){
        return preg_match('(^mysql:host=[^;]+;dbname=[^;]+;(?:port=\d{2,4};)?(?:charset=[^;]+;)?$)', $dsn);
    }

    public static function verifNews($title, $description, $link,$date) : array {
        $tmp = array();
        try {
            $tmp["date"] = new DateTime($date);
            $tmp["title"] = self::cleanVar($title);
            $tmp["desc"] = self::cleanVar($description);
            if(! $tmp["link"] = self::verifyUrl($link)){
                throw new Exception("Invalid URL");
            }
            return $tmp;
        }catch (Exception $e){

        }
    }

    private static function verifyUrl($url){
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    private static function cleanVar($var){
        return trim(htmlentities($var, ENT_QUOTES, 'UTF-8'));
    }

}