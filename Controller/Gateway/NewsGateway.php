<?php


namespace Web2A\Controller\Gateway;


use DateTime;
use Exception;
use PDO;
use Web2A\Model\NewsModel;

class NewsGateway extends Gateway {

    private function addNews(NewsModel $news) : bool{
        $query = "INSERT INTO `news`(`id`, `datepubli`, `site`, `titre`, `description`,`idSource`) VALUES (NULL,:datepubli,:site,:titre,:description,:idSource)";
        return $this->con->executeQuery($query, array(
            ':datepubli' => array($news->getDate()->format('Y-m-d H:i:s'), PDO::PARAM_STR),
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

    public function getNbNews() : int {
        $query = "SELECT COUNT(1) FROM `news`";
        $this->con->executeQuery($query);
        return $this->con->getResults()["COUNT(1)"];
    }

    private function removeAllNews() : bool{
        $query = "DELETE FROM `news`";
        return $this->con->executeQuery($query);
    }

    public function reloadNews($arr){
        $this->removeAllNews();
        foreach ($arr as $news){
            $this->addNews($news);
        }
    }

}