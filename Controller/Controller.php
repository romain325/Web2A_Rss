<?php

namespace Web2A\Controller;
/* ((((((((((((((((((THIS CLASS IS AN EXAMPLE DONT USE)))))))))))))))))))))) */

use Config;

class Controller {


    public static function selectPage(){
        if(isset($_GET['page'])){
            switch ($_GET['page']){
                case "login":
                    return new LoginController();
                case "admin":
                    return new AdminController();
                case "main":
                    return new NewsController();
                case "404":
                default:
                    return new MainController("404");
            }
        }else{
            header("location: ./?page=main");
        }
    }

    protected function __construct() {
        session_start();
    }

    protected function renderPage($name){
        require_once Config::getView($name);
    }

    private static $instance = null;

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = self::selectPage();
        }
        return self::$instance;
    }

    function ValidationFormulaire(array $dVueEreur) {
        global $ViewDir,$Views;


//si exception, ca remonte !!!
        $nom=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
        $age=$_POST['txtAge'];
        \Utils\Validation::val_form($nom,$age,$dVueEreur);

        $model = new \Model\Simplemodel();
        $data=$model->get_data();

        $dVue = array (
            'nom' => $nom,
            'age' => $age,
            'data' => $data,
        );
        require ($ViewDir.$Views['vuephp1']);
    }

}//fin class

?>