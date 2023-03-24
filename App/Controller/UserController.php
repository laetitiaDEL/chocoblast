<?php
    namespace App\Controller;
    use App\Model\Utilisateur;
    use App\Utils\Fonctions;

    class UserController extends Utilisateur{

        //fonction qui gère l'ajout d'utilisateur en BDD
        public function insertUser():void{
            //variable pour stocker les messages d'erreur
            $msg = "";
            /* LOGIQUE */
            //test si le bouton est cliqué
            if(isset($_POST['submit'])){
                $nom = Fonctions::cleanInput($_POST['nom_utilisateur']);
                $prenom = Fonctions::cleanInput($_POST['prenom_utilisateur']);
                $mail = Fonctions::cleanInput($_POST['mail_utilisateur']);
                $password = Fonctions::cleanInput($_POST['password_utilisateur']);

                //tester si les champs sont remplis
                if(!empty($nom) AND !empty($prenom) AND ! empty($mail) AND !empty($password)){
                    $this->setMailUtilisateur($mail); 

                    //tester si le compte existe déjà
                    if($this->getUserByMail()){
                        $msg = "Les identifiants ne correspondent pas.";
                    }else{
                        //hachage du mdp
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $this->setNomUtilisateur($nom);
                        $this->setPrenomUtilisateur($prenom);
                        $this->setPasswordUtilisateur($password);
                        $this->addUser();
                        //affichage de l'erreur
                        $msg = "Le compte: ".$mail." a été ajouté en BDD.";
                    }

                    
                  
                //si les champs ne sont pas tous remplis
                }else{
                    $msg = "Veuillez remplir les champs du formulaire.";
                }
            }
            //importer la vue
            include './App/Vue/viewAddUser.php';
        }

        public function connexionUser(){
            //variable pour stocker les messages d'erreur
            $msg = "";
            /* LOGIQUE */
            //test si le bouton est cliqué
            if(isset($_POST['submit'])){
                $mail = Fonctions::cleanInput($_POST['mail_utilisateur']);
                $password = Fonctions::cleanInput($_POST['password_utilisateur']);

                //tester si les champs sont remplis
                if(!empty($mail) AND !empty($password)){
                    $this->setMailUtilisateur($mail);
                    $this->setPasswordUtilisateur($password);

                    $data = $this->getUserByMail();
                    //tester si le compte existe
                    if($data){
                        //vérifier que le mdp est bon
                        if(password_verify($password, $data[0]->password_utilisateur)){
                            //créer les super globales de session
                            $_SESSION['connected'] = true;
                            $_SESSION['mail'] = $data[0]->mail_utilisateur;
                            $_SESSION['id'] = $data[0]->id_utilisateur;
                            $_SESSION['nom'] = $data[0]->nom_utilisateur;
                            $_SESSION['prenom'] = $data[0]->prenom_utilisateur;
                            echo "<p>Bonjour ".$_SESSION['nom']."</p>";
                        }else{
                            $msg = "Les informations de connexion sont invalides.";
                        }
                    }else{
                        $msg = "Les infos de connexion sont invalides.";   
                    }           
                //si les champs ne sont pas tous remplis
                }else{
                    $msg = "Veuillez remplir les champs du formulaire.";
                }
            }
            //importer la vue
            include './App/Vue/viewConnexion.php';
        }
    }
?>