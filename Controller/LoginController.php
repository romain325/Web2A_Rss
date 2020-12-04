<?php


namespace Web2A\Controller;
use Config;
use Exception;
use Web2A\Controller\Gateway\AdminGateway;
use Web2A\Model\AdminModel;
use Web2A\Utils\Utils;

class LoginController extends Controller {
    private string $error = "";
    private AdminModel $adm;

    public function __construct(){
        parent::__construct();
        Utils::checkConnected("admin");

        $result = $this->getInfo();

        if(is_array($result)){
            try {
                $adm = new AdminModel($result["user"], $result["pass"]);
            }catch (Exception $e){
                $this->error = $e->getMessage();
            }
        }

        $this->renderPage("login");
    }



    private function getInfo(){
        $user = $pass = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty(trim($_POST["username"]))){
                $user = trim($_POST["username"]);
            }else{
                $this->error = "Please Enter a Username";
            }
            if(!empty(trim($_POST["password"]))){
                $pass = trim($_POST["password"]);
            }else{
                $this->error = "Please Enter a Password";
            }

            if(!empty($user) && !empty($pass)){
                return array("user" => $user, "pass" => $pass);
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    /**
     * @return string
     */
    public function getError(): string{
        return $this->error;
    }

}