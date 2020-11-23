<?php


namespace Web2A\Controller;


use Config;
use Web2A\Controller\Gateway\AdminGateway;
use Web2A\Utils\Utils;

class AdminController extends Controller {
    private AdminGateway $gateway;

    public function __construct(){
        parent::__construct();
        Utils::ejectNotConnected();

        $this->gateway = new AdminGateway(Config::getDSN(), Config::$DBData["User"], Config::$DBData["Password"]);
        $this->updateInfo();

        $this->renderPage("admin");
    }

    private function updateInfo(){
        if(isset($_GET["logout"])){
            unset($_SESSION["loggedIn"]);
            unset($_SESSION["id"]);
            unset($_SESSION["username"]);
            header("Location: ./?page=main");
        }
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty(trim($_POST["nbElem"]))) {
                $this->gateway->changeNbElementsKept(trim($_POST["nbElem"]));
            }
        }
    }

    public function getNbElem() : int{
        return $this->gateway->getNbOfElementsKept();
    }

}