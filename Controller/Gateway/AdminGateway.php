<?php


namespace Web2A\Controller\Gateway;

use PDO;

class AdminGateway extends Gateway {

    public function IsPasswordValid(string $username, string $password){
        $query = "SELECT USERNAME,PASSWORD FROM `admin` WHERE username=:username";
        $this->con->executeQuery($query, array(':username' => array($username, PDO::PARAM_STR)));
        $result = $this->con->getResults();
        if (count($result) != 1){
            return "username";
        }else{
            $result = $result[0];
            if(password_verify($password, $result["PASSWORD"])){
                unset($result["PASSWORD"]);
                return $result;
            }else{
                return "password";
            }
        }
    }

    public function addAdmin(string $name, string $password) : bool{
        $query = "INSERT INTO `admin`(`id`, `username`, `password`) VALUES (NULL,:username,:password)";
        return $this->con->executeQuery($query, array(
           ':username' => array($name, PDO::PARAM_STR),
           ':password' => array(password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR)
        ));
    }

}