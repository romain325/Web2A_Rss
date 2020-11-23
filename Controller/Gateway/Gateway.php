<?php


namespace Web2A\Controller\Gateway;


use PDO;
use Web2A\Utils\DbConnect;

abstract class Gateway {

    protected DbConnect $con;

    public function __construct(string $dsn, string $username, string $password){
        $this->con = new DbConnect($dsn, $username, $password);
    }

    protected function getSourceIdFromLink(string $source) : int{
        $query= "SELECT `id` FROM `source` WHERE lien=:source";
        $res = $this->con->executeQuery($query, array(':source' => array($source, PDO::PARAM_STR)));
        if(!$res) return 0;
        $res = $this->con->getResults();
        return $res[0]["id"];
    }

    protected function getSourceLinkFromId(string $source) : string{
        $query= "SELECT `lien` FROM `source` WHERE id=:id";
        $res = $this->con->executeQuery($query, array(':id' => array($source, PDO::PARAM_INT)));
        if(!$res) return 0;
        $res = $this->con->getResults();
        return $res[0]["lien"];
    }
}