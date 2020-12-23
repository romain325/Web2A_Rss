<?php

namespace Web2A\Controller;

use Config;
use Exception;
use Web2A\DAL\Gateway\NewsGateway;

class Controller {
    public static string $errorMessage = "";

    public static function selectPage(){
        session_start();
        if(isset($_GET['page'])){
            try{
                if(!isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] !== true){
                    return new UserController();
                }else{
                    return new AdminController();
                }

            }catch(Exception $e){
                Controller::$errorMessage = $e->getMessage();
                require_once Config::getView("error");
            }

        }else{
            header("location: ./?page=main");
            die();
        }
    }

    protected function __construct() {
        session_start();
    }

    protected function renderPage($name){
        require_once Config::getView($name);
    }


    // Singleton
    private static $instance = null;
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = self::selectPage();
        }
        return self::$instance;
    }



    /** Common part to both of User and Admin: news page **/

    private NewsGateway $gateway;

    protected function newsPage(){
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