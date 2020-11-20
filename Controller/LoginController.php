<?php


namespace Web2A\Controller;
use Exception;

require_once "../Utils/Config.php";

class LoginController {
    private string $userError;
    private string $passError;

    public function __construct(){
        $this->userError = $this->passError = "";
        $result = $this->getInfo();

        if(is_array($result)){
            $this->login($result["user"], $result["pass"]);
        }
    }

    private function getInfo(){
        $user = $pass = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty(trim($_POST["username"]))){
                $user = trim($_POST["username"]);
            }else{
                $this->userError = "Please Enter a Username";
            }
            if(!empty(trim($_POST["password"]))){
                $pass = trim($_POST["password"]);
            }else{
                $this->passError = "Please Enter a Password";
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

    private function login(string $username, string $password){
        try {
            global $DBData;
            echo $DBData["dsn"];
            //TODO Find Why is it sending an error
            /*
            $UserDb = new UserGateway($DBData["dsn"], $DBData["User"], $DBData["Password"]);
            $result = $UserDb->IsPasswordValid($username,$password);
            if($result == "username"){
                $this->userError = "Username not found";
            }elseif($result == "password"){
                $this->passError = "Password Invalid";
            }else{
                $this->setConnected($result);
            }*/
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }

    private function setConnected(array $row){
        global $Views;
        session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        header("location: " . $Views["Admin"]);
    }

    /**
     * @return string
     */
    public function getUserError(): string
    {
        return $this->userError;
    }

    /**
     * @return string
     */
    public function getPassError(): string
    {
        return $this->passError;
    }

}