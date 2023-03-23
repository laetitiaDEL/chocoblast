<?php
    namespace App\Model;
    use App\Utils\BddConnect;

    class Roles extends BddConnect {
        //Attributs
        private ?int $id_roles;
        private ?string $nom_roles;

        //Constructeur
        public function __construct(){
            //$this->nom_roles = $name;
        }

        //Getters et setters
        public function getIdRoles():?int{
            return $this->id_roles;
        }
        public function getNomRoles():?string{
            return $this->nom_roles;
        }
        public function setNomRoles($name):void{
            $this->nom_roles = $name;
        }

        //méthodes
            //ajouter un role
            public function addRoles():void{
        
                try{
                    
                    //récupérer les données
                    $role = $this->nom_roles;
    
                    //préparer la requête
                    $req = $this->connexion()->prepare('INSERT INTO roles(nom_roles) VALUES(?)'); 
    
                    //binding des paramètres
                    $req->bindParam(1, $role, \PDO::PARAM_STR);
    
                    //exécuter la requête
                    $req->execute();
    
                }
                catch(\Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
    }


?>