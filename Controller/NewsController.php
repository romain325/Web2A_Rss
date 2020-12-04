<?php


namespace Web2A\Controller;


use Config;
use Web2A\Controller\Gateway\NewsGateway;
use Web2A\Model\NewsModel;
use Web2A\Utils\Verification;

class NewsController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->gateway = new NewsGateway(Config::getDSN(), Config::$DBData["User"], Config::$DBData["Password"]);
        $this->renderPage("main");
    }

    private function getCurrentPage(){
        if(isset($_GET["n"])){
            return intval($_GET["n"]);
        }else{
            return 1;
        }
    }

    private function getNbPage(){
        return $this->gateway->getNbPage();
    }

    public function getPageNews(){
        return $this->gateway->getNews(($this->getCurrentPage() -1) * Config::$nbPerPage, Config::$nbPerPage);
    }

    public function getAllNews() : array {
        return $this->gateway->getAllNews();
    }

    public function getNavStr() : string{
        $n = $this->getNbPage();
        $str = "";
        for ($i = 1; $i <= $n; $i++){
            $str = $str.'<a href="./?page=main&n='.$i.'">'.$i.'</a>'."...";
        }
        if($this->getCurrentPage() != $n){
            $str = $str.' <a href="./?page=main&n='.($this->getCurrentPage() +1).'">>> Next Page</a>';
        }
        if($this->getCurrentPage() > 1){
            $str = '<a href="./?page=main&n='.($this->getCurrentPage() - 1).'"> Previous Page << </a> '.$str;
        }
        return $str;
    }
}