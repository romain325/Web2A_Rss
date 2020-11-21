<?php


namespace Web2A\Controller\Gateway;


use Web2A\Utils\DbConnect;

abstract class Gateway {

    protected DbConnect $con;

    public function __construct(string $dsn, string $username, string $password){
        $this->con = new DbConnect($dsn, $username, $password);
    }
}