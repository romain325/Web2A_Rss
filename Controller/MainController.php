<?php


namespace Web2A\Controller;


use Config;

class MainController extends Controller {

    public function __construct(string $page){
        parent::__construct();
        $this->renderPage($page);
    }

}