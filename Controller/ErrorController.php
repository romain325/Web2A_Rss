<?php


namespace Web2A\Controller;


class ErrorController extends Controller {
    private string $errorMessage;

    public function __construct(string $errorMessage){
        parent::__construct();

        $this->errorMessage = $errorMessage;

        $this->renderPage("error");
    }


    public function getErrorMessage() : string {
        return "<h1>Oops an Error!</h1><p>".$this->errorMessage."</p>";
    }


}