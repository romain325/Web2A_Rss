<?php

namespace Web2A\Config;

use DateTime;
use Exception;
use Web2A\Controller\ErrorController;

class Verification {

    public static function verifDbConnect($dsn, $username, $password) : bool {
        return self::verifDSN($dsn) && (!empty($password)) && (!empty($username));
    }

    private static function verifDSN($dsn){
        return preg_match('(^mysql:host=[^;]+;dbname=[^;]+;(?:port=\d{2,4};)?(?:charset=[^;]+;)?$)', $dsn);
    }

    public static function verifNews($title, $description, $link,$date, $sourceLien) : array {
        $tmp = array();

        if(! self::isDateTime($date)){
            throw new Exception("Invalid Date");
        }
        $tmp["date"] = $date;
        $tmp["title"] = self::cleanVar($title);
        $tmp["desc"] = self::cleanVar($description);
        $tmp["source"] = self::cleanVar($sourceLien);
        if(! $tmp["link"] = self::verifyUrl($link)){
            throw new Exception("Invalid URL");
        }
        return $tmp;
    }

    public static function verifSource($name, $link) : array{
        $tmp = [];
        $tmp["name"] = self::cleanVar($name);
        if(! $tmp["link"] = self::verifyUrl($link)){
            throw new Exception("Invalid URL");
        }
        return $tmp;
    }

    private static function verifyUrl($url){
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    private static function isDateTime($date){
        return $date instanceof DateTime;
    }


    public static function compareDate(DateTime $a, DateTime $b){
        return ($a < $b) ? 1 : -1;
    }

    private static function cleanVar($var){
        return trim(html_entity_decode($var, ENT_QUOTES, 'UTF-8'));
    }

}