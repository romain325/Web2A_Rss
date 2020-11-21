<?php


namespace Web2A\Controller;


use DateTime;
use Exception;
use PDO;
use Web2A\Model\NewsModel;

class NewsGateway extends Gateway {

    public function addNews(NewsModel $news) : bool{
        $query = "INSERT INTO `news`(`id`, `datepubli`, `site`, `titre`, `description`) VALUES (NULL,:datepubli,:site,:titre,:description)";
        return $this->con->executeQuery($query, array(
            ':datepubli' => array($news->getDate(), PDO::PARAM_STR),
            ':site' => array($news->getLink(), PDO::PARAM_STR),
            ':titre' => array($news->getTitle(), PDO::PARAM_STR),
            ':description' => array($news->getDescription(), PDO::PARAM_STR))
        );
    }

    public function getAllNews() : array{
        $arr = [];
        $query = "SELECT * FROM `news`";
        $this->con->executeQuery($query);
        foreach ($this->con->getResults() as $row){
            try {
                array_push($arr, new NewsModel($row["titre"], $row["description"], $row["site"], new DateTime($row["datepubli"])));
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