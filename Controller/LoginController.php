<?php


namespace Web2A\Controller;
use Config;
use Exception;
use Web2A\Utils\Utils;

class LoginController extends Controller {
    private array $error = array(
        "user" => "",
        "pass" => ""
    );

    public function __construct(){
        Utils::checkConnected("admin");

        $result = $this->getInfo();

        if(is_array($result)){
            $this->login($result["user"], $result["pass"]);
        }

        $this->renderPage("login");
    }

    private function getInfo(){
        $user = $pass = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty(trim($_POST["username"]))){
                $user = trim($_POST["username"]);
            }else{
                $this->error["user"] = "Please Enter a Username";
            }
            if(!empty(trim($_POST["password"]))){
                $pass = trim($_POST["password"]);
            }else{
                $this->error["pass"] = "Please Enter a Password";
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
    // TODO Find why it returns home
    private function login(string $username, string $password){
        try {
            global $DBData;
            echo $DBData["dsn"];

            $UserDb = new UserGateway($DBData["dsn"], $DBData["User"], $DBData["Password"]);
            $result = $UserDb->IsPasswordValid($username,$password);
            if($result == "username"){
                $this->error["user"] = "Username not found";
            }elseif($result == "password"){
                $this->error["pass"] = "Password Invalid";
            }else{
                $this->setConnected($result);
            }
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
        return $this->error["user"];
    }

    /**
     * @return string
     */
    public function getPassError(): string
    {
        return $this->error["pass"];
    }

}