<?php
namespace App\Controller;
use App\Utils\Fonctions;
use App\Model\Utilisateur;
use App\Model\Chocoblast;

class ChocoblastController extends Chocoblast{
    //Méthode pour ajouter un chocoblast
    public function insertChocoblast():void{
        //test si user connecté
        if(isset($_SESSION['connected'])){
            //générer la liste déroulante
            $user = new Utilisateur();
            $data = $user->getUserAll();
            //variable pour stocker les messages 
            $msg = "";
            //Tester si le formulaire est submit 
            if(isset($_POST['submit'])){
                $slogan = Fonctions::cleanInput($_POST['slogan_chocoblast']);
                $date = Fonctions::cleanInput($_POST['date_chocoblast']);
                $cible = Fonctions::cleanInput($_POST['cible_chocoblast']);

                //récupérer des valeurs
                $auteur = $_SESSION['id'];

                //test si les champs sont remplis
                if(!empty($slogan) AND !empty($date) AND !empty($cible) AND !empty($auteur)){
                    //setter les valeurs à l'objet 
                    $this->setSloganChocoblast($slogan);
                    $this->setDateChocoblast($date);
                    $this->getCibleChocoblast()->setIdUtilisateur($cible);
                    $this->getAuteurChocoblast()->setIdUtilisateur($auteur);
                    //ajouter en bdd le Chocoblast 
                    $this->addChocoblast();
                    $msg = "Le chocoblast : ".$slogan." a été ajouté en BDD.";
                }else{
                    //les champs sont vides 
                    $msg = "Veuillez remplir les champs.";
                }
            }
            //import de la vue 
            include './App/Vue/viewAddChocoblast.php';

        }else{
            header('Location: ./');
        }
    }

    public function showAllChocoblast(){
        //générer la liste des chocoblasts
        $choco = $this->getChocoblastAll();
        //variable pour les msg d'erreur
        $msg = "";
        //Test si il existe des chocoblasts 
        if(!$choco){
            $msg = "Il n'y a aucun chocoblast à voir... pour l'instant.";
        };
        //import de la vue 
        include './App/Vue/viewShowAllChocoblast.php';
    }

}



?>