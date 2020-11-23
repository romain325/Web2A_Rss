<?php


namespace Web2A\Controller;


use Config;
use Web2A\Controller\Gateway\AdminGateway;
use Web2A\Utils\Utils;
use Web2A\Utils\Verification;

class AdminController extends Controller {
    private AdminGateway $gateway;
    private $sources;

    public function __construct(){
        parent::__construct();
        Utils::ejectNotConnected();

        $this->gateway = new AdminGateway(Config::getDSN(), Config::$DBData["User"], Config::$DBData["Password"]);
        $this->updateInfo();
        $this->sources = $this->getAllSources();

        $this->renderPage("admin");
    }

    private function updateInfo(){
        $this->checkLogout();
        $this->checkReload();

        $this->checkPOSTRequest();
    }

    private function checkPOSTRequest(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nbElem = intval($_POST["nbElem"]);
            if (isset($nbElem) && !empty(trim($nbElem))) {
                $this->gateway->changeNbElementsKept($nbElem);
                return;
            }

            $idSource = intval($_POST["idSource"]);
            if (isset($idSource) && !empty(trim($idSource))) {
                $this->gateway->removeSource($idSource);
                return;
            }

            $newName = trim($_POST["newName"]);
            $newLink = trim($_POST["newLink"]);
            if (isset($newName) && isset($newLink) && !empty($newName) && !empty($newLink)) {
                $arr = Verification::verifSource($newName,$newLink);
                $this->gateway->addSource($arr["name"],$arr["link"]);
                return;
            }
        }
    }

    private function checkLogout(){
        if(isset($_GET["logout"])){
            unset($_SESSION["loggedIn"]);
            unset($_SESSION["id"]);
            unset($_SESSION["username"]);
            header("Location: ./?page=main");
        }
    }

    private function checkReload(){
        if(isset($_GET["reload"])){
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $idSource = intval($_POST["reloadSource"]);
                if (isset($idSource) && !empty(trim($idSource))) {
                    $this->gateway->reloadData($idSource);
                    return;
                }
            }
        }
    }

    public function getNbElem() : int{
        return $this->gateway->getNbOfElementsKept();
    }

    private function getAllSources() : array{
        return $this->gateway->getAllSources();
    }

    /**
     * @return array
     */
    public function getSources(): array{
        return $this->sources;
    }

    private function getSourcesCount() : int {
        return $this->gateway->getSourcesCount();
    }

}