<?php


namespace Web2A\Controller;

use Web2A\Model\AdminModel;

class UserController extends Controller {
    private string $authError = "";

    public function __construct(){
        parent::__construct();

        switch ($_GET["page"]){
            case "main":
                $this->newsPage();
                break;
            case "login":
                $this->loginPage();
                break;
            case "admin":
            default:
                throw new \Exception("Where are you trying to go ?");
        }
    }


/** Login Section **/

    private function loginPage(){
        $result = $this->getConnexionInfo();

        if(is_array($result)){
            try {
                $adm = new AdminModel($result["user"], $result["pass"]);
            }catch (\Exception $e){
                $this->authError = $e->getMessage();
            }
        }
        $this->renderPage("login");
    }

    private function getConnexionInfo(){
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

    public function getError(): string{
        return $this->authError;
    }


}