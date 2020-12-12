<?php


namespace Web2A\Controller\Gateway;


use PDO;
use Web2A\Model\SourceModel;

class SourceGateway extends Gateway {
    public function getAllSources() : array{
        $arr = [];
        $query = "SELECT * FROM `source`";
        $this->con->executeQuery($query);
        foreach ($this->con->getResults() as $row){
            try {
                array_push($arr, new SourceModel($row["id"],$row["nom"], $row["lien"]));
            } catch (\Exception $e) {
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
}