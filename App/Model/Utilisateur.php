<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;

    class Utilisateur extends BddConnect{
        //Attributs
        private ?int $id_utilisateur;
        private ?string $nom_utilisateur;
        private ?string $prenom_utilisateur;
        private ?string $mail_utilisateur;
        private ?string $password_utilisateur;
        private ?string $image_utilisateur;
        private ?bool $statut_utilisateur;
        private ?Roles $roles;

        //Constructeur
        public function __construct(){
            //instancier un objet roles à la création
            //$this->roles = new Roles('utilisateur');
        }

        //Getters et setters
        public function getIdUtilisateur():string{
            return $this->id_utilisateur;
        }
        public function getNomUtilisateur():string{
            return $this->nom_utilisateur;
        }
        public function getPrenomUtilisateur():string{
            return $this->prenom_utilisateur;
        }
        public function getMailUtilisateur():string{
            return $this->mail_utilisateur;
        }
        public function getPasswordUtilisateur():string{
            return $this->password_utilisateur;
        }

        public function setNomUtilisateur(? string $name):void{
            $this->nom_utilisateur = $name;
        }
        public function setPrenomUtilisateur(? string $firstname):void{
            $this->prenom_utilisateur = $firstname;
        }
        public function setMailUtilisateur(? string $email):void{
            $this->mail_utilisateur = $email;
        }
        public function setPasswordUtilisateur(? string $pass):void{
            $this->password_utilisateur = $pass;
        }

        //Méthodes

        //ajouter un user
        public function addUser():void{
            
            try{
                
                //récupérer les données
                $nom = $this->nom_utilisateur;
                $prenom = $this->prenom_utilisateur;
                $mail = $this->mail_utilisateur;
                $password = $this->password_utilisateur;

                //préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur) VALUES(?,?,?,?)'); 

                //binding des paramètres
                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                $req->bindParam(2, $prenom, \PDO::PARAM_STR);
                $req->bindParam(3, $mail, \PDO::PARAM_STR);
                $req->bindParam(4, $password, \PDO::PARAM_STR);

                //exécuter la requête
                $req->execute();

            }
            catch(\Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }


        //méthode pour récupérer un utilisateur avec son mail
        public function getUserByMail():?array{
            try{
                $mail = $this->mail_utilisateur;
                //préparer la requête
                $req = $this->connexion()->prepare('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur, statut_utilisateur, id_roles FROM utilisateur WHERE mail_utilisateur = ?');
                //bind des param
                $req->bindParam(1, $mail, \PDO::PARAM_STR);
                //exécuter la requête
                $req->execute();
                //fetch : mettre les enregistrements dans un tableau (ici un tableau d'objets)
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }catch (\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
            
        }

    }


?>