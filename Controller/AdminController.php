<?php


namespace Web2A\Controller;


use Web2A\Utils\Utils;

class AdminController extends Controller {

    public function __construct(){
        parent::__construct();
        Utils::ejectNotConnected();
        $this->renderPage("admin");
    }

}