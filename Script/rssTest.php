#!/usr/bin/php7.4
<?php

require_once "../Config/RssParser.php";
require_once "../Config/Verification.php";
require_once "../Model/NewsModel.php";

if($argv[1] == "-h"){
    echo "./rssTest.php <Link>";
}else{
    $test = new \Web2A\Config\RssParser($argv[1]);
    print_r($test->getNArticles(3));
}


