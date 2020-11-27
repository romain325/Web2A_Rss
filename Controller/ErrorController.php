<?php


namespace Web2A\Controller;


use Web2A\Controller\Gateway\AdminGateway;
use Web2A\Utils\Utils;

class ErrorController extends Controller {
    private array $error = array(
        "user" => "",
        "pass" => ""
    );

    public function __construct(){
        parent::__construct();

        $result = $this->getInfo();

        $this->renderPage("error");
    }

    private function getInfo(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

        }
    }


}