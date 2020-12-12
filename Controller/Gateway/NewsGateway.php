<?php


namespace Web2A\Controller\Gateway;


use Config;
use DateTime;
use Exception;
use PDO;
use Web2A\Model\NewsModel;

class NewsGateway extends Gateway {

    private function addNews(NewsModel $news) : bool{
        $query = "INSERT INTO `news`(`id`, `datepubli`, `site`, `titre`, `description`,`idSource`) VALUES (NULL,:datepubli,:site,:titre,:description,:idSource)";
        return $this->con->executeQuery($query, array(
            ':datepubli' => array($news->date->format('Y-m-d H:i:s'), PDO::PARAM_STR),
            ':site' => array($news->link, PDO::PARAM_STR),
            ':titre' => array($news->title, PDO::PARAM_STR),
            ':description' => array($news->description, PDO::PARAM_STR),
            ':idSource' => array($this->getSourceIdFromLink($news->sourceLien), PDO::PARAM_STR))
        );
    }

    public function getAllNews() : array{
        $arr = [];
        $query = "SELECT N.*, S.lien FROM `news` N, `source` S WHERE S.id = N.idSource ORDER BY N.datepubli DESC";
        $this->con->executeQuery($query);
        foreach ($this->con->getResults() as $row){
            try {
                $model =new NewsModel($row["titre"], $row["description"], $row["site"], new DateTime($row["datepubli"]), $row["lien"]);
            } catch (Exception $e) {
                continue;
            }
            array_push($arr, $model);
        }
        return $arr;
    }

    public function getNews(int $firstNews, int $nbNews) : array{
        $arr = [];
        $query = "SELECT N.*, S.lien FROM `news` N, `source` S WHERE S.id = N.idSource ORDER BY N.datepubli LIMIT :first, :nb";
        $this->con->executeQuery($query, array(
            ':first' => array($firstNews,PDO::PARAM_INT),
            ':nb' => array($nbNews, PDO::PARAM_INT)
        ));
        foreach ($this->con->getResults() as $row){
            try {
                array_push($arr, new NewsModel($row["titre"], $row["description"], $row["site"], new DateTime($row["datepubli"]), $row["lien"]));
            } catch (Exception $e) {
            }
        }
        return $arr;
    }


    public function getNbPage() : int {
        $query = "SELECT COUNT(1) FROM `news`";
        $this->con->executeQuery($query);
        $value = ($this->con->getResults()[0]["COUNT(1)"] / Config::$nbPerPage);
        if($value > intval($value)){
            return intval($value) + 1;
        }
        return intval($value);
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