<?php


namespace Web2A\Controller\Gateway;


use DateTime;
use Exception;
use PDO;
use Web2A\Model\NewsModel;

class NewsGateway extends Gateway {

    private function getSourceIdFromLink(string $source) : int{
        $query= "SELECT `id` FROM `source` WHERE lien=:source";
        $res = $this->con->executeQuery($query, array(':source' => array($source, PDO::PARAM_STR)));
        if(!$res) return 0;
        $res = $this->con->getResults();
        return $res[0]["id"];

    }

    public function addNews(NewsModel $news) : bool{
        $query = "INSERT INTO `news`(`id`, `datepubli`, `site`, `titre`, `description`,`idSource`) VALUES (NULL,:datepubli,:site,:titre,:description,:idSource)";
        return $this->con->executeQuery($query, array(
            ':datepubli' => array($news->getDate(), PDO::PARAM_STR),
            ':site' => array($news->getLink(), PDO::PARAM_STR),
            ':titre' => array($news->getTitle(), PDO::PARAM_STR),
            ':description' => array($news->getDescription(), PDO::PARAM_STR),
            ':idSource' => array($this->getSourceIdFromLink($news->getSourceLien()), PDO::PARAM_STR))
        );
    }

    public function getAllNews() : array{
        $arr = [];
        $query = "SELECT N.*, S.lien FROM `news` N, `source` S WHERE S.id = N.idSource";
        $this->con->executeQuery($query);
        foreach ($this->con->getResults() as $row){
            try {
                array_push($arr, new NewsModel($row["titre"], $row["description"], $row["site"], new DateTime($row["datepubli"]), $row["lien"]));
            } catch (Exception $e) {
            }
        }
        return $arr;
    }

    public function removeAllNews() : bool{
        $query = "DELETE FROM `news`";
        return $this->con->executeQuery($query);
    }

}