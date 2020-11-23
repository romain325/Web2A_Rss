<?php


namespace Web2A\Controller\Gateway;

use Config;
use PDO;
use Web2A\Model\SourceModel;
use Web2A\Utils\RssParser;

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

    public function getAllSources() : array{
        $arr = [];
        $query = "SELECT * FROM `source`";
        $this->con->executeQuery($query);
        foreach ($this->con->getResults() as $row){
            try {
                array_push($arr, new SourceModel($row["id"],$row["nom"], $row["lien"]));
            } catch (Exception $e) {
                echo $e;
            }
        }
        return $arr;
    }

    public function removeSource($id){
        if($id == 0) return;
        $query = "UPDATE `news` SET `idSource`=0 WHERE idSource=:id";
        $query2 = "DELETE FROM `source` WHERE id=:id";
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $this->con->executeQuery($query2, array(':id' => array($id, PDO::PARAM_INT)));
    }

    public function addSource(string $nom, string $lien) : bool {
        $query = "INSERT INTO `source`(`nom`, `lien`) VALUES (:name,:link)";
        return $this->con->executeQuery($query, array(
           ':name' => array($nom, PDO::PARAM_STR),
           ':link' => array($lien, PDO::PARAM_STR)
        ));
    }

    public function getSourcesCount() : int {
        $query = "SELECT COUNT(1) FROM `source`";
        $this->con->executeQuery($query);
        return $this->con->getResults()[0]["COUNT(1)"];
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