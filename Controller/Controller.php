<?php

namespace Web2A\Controller;
/* ((((((((((((((((((THIS CLASS IS AN EXAMPLE DONT USE)))))))))))))))))))))) */
class Controller {

    function __construct() {
        global $rep,$Views;
        session_start();

//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();

        try{
            $action=$_REQUEST['action'];

            switch($action) {

//pas d'action, on réinitialise 1er appel
                case NULL:
                    $this->Reinit();
                    break;


                case "validationFormulaire":
                    $this->ValidationFormulaire($dVueEreur);
                    break;

//mauvaise action
                default:
                    $dVueEreur[] =	"Erreur d'appel php";
                    require ($rep.$Views['vuephp1']);
                    break;
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$Views['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$Views['erreur']);
        }


//fin
        exit(0);
    }//fin constructeur


    function Reinit() {
        global $rep,$Views;

        $dVue = array (
            'nom' => "",
            'age' => 0,
        );
        require ($rep.$Views['vuephp1']);
    }

    function ValidationFormulaire(array $dVueEreur) {
        global $rep,$Views;


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
        require ($rep.$Views['vuephp1']);
    }

}//fin class

?>