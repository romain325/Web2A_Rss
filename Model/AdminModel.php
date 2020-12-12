<?php


namespace Web2A\Model;


use Config;
use Web2A\Controller\Gateway\AdminGateway;

class AdminModel {
    private int $id;
    private string $name;

    public function __construct(string $name, string $password) {
        $this->login($name,$password);
    }

    private function login(string $username, string $password) {
        $UserDb = new AdminGateway(Config::getDSN(), Config::$DBData["User"], Config::$DBData["Password"]);
        $result = $UserDb->IsPasswordValid($username,$password);
        if($result == "username"){
            throw new \Exception("Invalid Username");
        }elseif($result == "password"){
            throw new \Exception("Invalid Password");
        }else{
            $this->setConnected($result);
        }
    }

    private function setConnected(array $row){
        session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["id"] = $row["ID"];
        $_SESSION["username"] = $row["USERNAME"];
        header("location: ./?page=admin");
    }
}