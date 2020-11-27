<?php


namespace Web2A\Controller;


use Config;
use Web2A\Controller\Gateway\NewsGateway;
use Web2A\Model\NewsModel;
use Web2A\Utils\Verification;

class NewsController extends Controller {
    private NewsGateway $newsController;

    public function __construct(){
        parent::__construct();
        $this->gateway = new NewsGateway(Config::getDSN(), Config::$DBData["User"], Config::$DBData["Password"]);
        $this->renderPage("main");
    }

    public function getNbPage(){
        if(isset($_GET["n"])){
            return intval($_GET["n"]);
        }else{
            return 1;
        }
    }

    public static function compareNewsModel(NewsModel $a, NewsModel $b){
        return Verification::compareDate($a->getDate(),$b->getDate());
    }

    // TODO GET news by pagination SELECT * FROM NEWS LIMIT :debut :fin

    public function getAllNews() : array {
        $arr = $this->gateway->getAllNews();
        uasort($arr, '\Web2A\Controller\NewsController::compareNewsModel');
        return $arr;
    }
}