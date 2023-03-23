<?php
    namespace App\Controller;
    use App\Model\Roles;
    use App\Utils\Fonctions;

    class RolesController extends Roles{

        //fonction qui gère l'ajout d'un role en BDD
        public function insertRoles(){
            //variable pour stocker les messages d'erreur
            $msg = "";
            /* LOGIQUE */
            //test si le bouton est cliqué
            if(isset($_POST['submit'])){
                $role = Fonctions::cleanInput($_POST['nom_roles']);

                //tester si les champs sont remplis
                if(!empty($role)){
                    $this->setNomRoles($role); 
                    $this->addRoles();
                    $msg = "Le role : ".$role." a été ajouté en BDD.";

                //si les champs ne sont pas tous remplis
                }else{
                    $msg = "Veuillez remplir les champs du formulaire.";
                }
            }

            //importer la vue
            include './App/Vue/viewAddRoles.php';
        }
    }

?>