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
                default:
                    return new MainController($_GET['page']);
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


    //function __construct() {
        //global $ViewDir,$Views;
        //session_start();
        /*$dVueErreur = array ();
        try{
            $action=$_REQUEST['action'];

            switch($action) {

                case NULL:
                    $this->Reinit();
                    break;


                case "validationFormulaire":
                    $this->ValidationFormulaire($dVueErreur);
                    break;

                default:
                    $dVueErreur[] =	"Erreur d'appel php";
                    require ($ViewDir.$Views['vuephp1']);
                    break;
            }

        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($ViewDir.$Views['erreur']);

        }
        catch (Exception $e2) {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($ViewDir.$Views['erreur']);
        }
        exit(0);*/
    //}

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