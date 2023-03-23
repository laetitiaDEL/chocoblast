<?php
    namespace App\Controller;
    use App\Model\Roles;
    use App\Utils\Fonctions;

    class RolesController extends Roles{

        //fonction qui gère l'ajout d'un role en BDD
        public function insertRoles():void{
            //variable pour stocker les messages d'erreur
            $msg = "";
            /* LOGIQUE */
            //test si le bouton est cliqué
            if(isset($_POST['submit'])){
                $nom = Fonctions::cleanInput($_POST['nom_roles']);

                //tester si les champs sont remplis
                if(!empty($nom)){
                    //setter les valeurs de l'objet
                    $this->setNomRoles($nom);
                    //test si le rôle existe déjà
                    if($this->getRolesByName()){
                        $msg = "Le rôle : ".$nom." existe déjà.";
                    } else{
                        //ajouter en BDD le nouveau rôle
                        $this->addRoles();
                        //afficher la confirmation
                        $msg = "Le role : ".$nom." a été ajouté en BDD.";
                    }
                    
                //si les champs ne sont pas tous remplis
                }else{
                    //afficher erreur
                    $msg = "Veuillez remplir les champs du formulaire.";
                }
            }

            //importer la vue
            include './App/Vue/viewAddRoles.php';
        }
    }

?>