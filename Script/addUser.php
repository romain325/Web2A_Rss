#!/usr/bin/php7.4

<?php

use Web2A\Controller\Gateway\AdminGateway;

require_once "../Config/DbConnect.php";
require_once "../Config/Verification.php";
require_once "../Controller/Gateway/Gateway.php";
require_once "../Controller/Gateway/AdminGateway.php";
require_once "../Config/Config.php";


if($argv[1] == "-h"){
    echo "./addUser.php <AdminName> <AdminPassword>";
}else{
    try {
        $user = new AdminGateway(Config::getDSN(), Config::$DBData["User"], Config::$DBData["Password"]);

        $user->addAdmin($argv[1],$argv[2]);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}


