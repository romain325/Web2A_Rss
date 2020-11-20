<?php


namespace Web2A\Controller;

use Web2A\Utils\DbConnect;

class UserGateway {
    private DbConnect $con;

    public function __construct(string $dsn, string $username, string $password){
        $this->con = new DbConnect($dsn, $username, $password);
    }

    public function IsPasswordValid(string $username, string $password){
        $query = "SELECT USERNAME,PASSWORD FROM `admin` WHERE username=:username";
        $this->con->executeQuery($query, array(':username' => array($username, PDO::PARAM_STR)));
        $result = $this->con->getResults();
        if (count($result) != 1){
            return "username";
        }else{
            $result = $result[0];
            if(password_verify($password, $result["password"])){
                unset($result["password"]);
                return $result;
            }else{
                return "password";
            }
        }
    }

}