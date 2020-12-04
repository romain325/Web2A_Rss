<?php

namespace Web2A\Controller;

use Config;

class Controller {


    public static function selectPage(){
        if(isset($_GET['page'])){
            switch ($_GET['page']){
                case "erreur":
                    return new ErrorController();
                case "login":
                    return new LoginController();
                case "admin":
                    return new AdminController();
                case "main":
                    return new NewsController();
                case "404":
                default:
                    return new MainController("404");
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

}