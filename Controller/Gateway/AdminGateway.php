<?php


namespace Web2A\Controller\Gateway;

use Config;
use PDO;
use Web2A\Config\RssParser;

class AdminGateway extends Gateway {

    public function IsPasswordValid(string $username, string $password){
        $query = "SELECT ID,USERNAME,PASSWORD FROM `admin` WHERE username=:username";
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
    
    public function changeNbElementsKept(int $val) : bool{
        $query = "UPDATE `parametre` SET `valeur`=:value WHERE nom='nbelem'";
        return $this->con->executeQuery($query, array(':value' => array($val, PDO::PARAM_INT)));
    }

    public function getNbOfElementsKept() : int {
        $query = "SELECT valeur FROM `parametre` WHERE `nom`='nbelem'";
        $this->con->executeQuery($query);
        return $this->con->getResults()[0]["valeur"];
    }

    public function addAdmin(string $name, string $password) : bool{
        $query = "INSERT INTO `admin`(`id`, `username`, `password`) VALUES (NULL,:username,:password)";
        return $this->con->executeQuery($query, array(
           ':username' => array($name, PDO::PARAM_STR),
           ':password' => array(password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR)
        ));
    }



    public function reloadData($idSource){
        if($idSource == 0) return;
        $N = $this->getNbOfElementsKept();
        $source = $this->getSourceLinkFromId($idSource);
        $newsManager = new NewsGateway(Config::getDSN(), Config::$DBData["User"], Config::$DBData["Password"]);

        $parser = new RssParser($source);
        $articles = $parser->getNArticles($N);
        $newsManager->reloadNews($articles);
    }
}