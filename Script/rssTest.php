#!/usr/bin/php7.4
<?php

require_once "../Utils/RssParser.php";
require_once "../Utils/Verification.php";
require_once "../Model/NewsModel.php";

if($argv[1] == "-h"){
    echo "./rssTest.php <Link>";
}else{
    $test = new \Web2A\Utils\RssParser($argv[1]);
    print_r($test->getNArticles(3));
}

