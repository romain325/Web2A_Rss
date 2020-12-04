<?php


namespace Web2A\Controller;


class ErrorController extends Controller {
    private string $errorMessage;

    public function __construct(){
        parent::__construct();

        $result = $this->getInfo();

        $this->renderPage("error");
    }

    private function getInfo(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

        }else{
            $this->errorMessage = "Unknown Error";
        }
    }

    public function getErrorMessage() : string {
        return "<h1>".$this->errorMessage."</h1><p>We did not manage to find what was your error we're sorry !</p>";
    }


}