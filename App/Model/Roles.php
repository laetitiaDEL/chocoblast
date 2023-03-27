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
        public function setIdRoles($id):void{
            $this->id_roles = $id;
        }
        public function setNomRoles($name):void{
            $this->nom_roles = $name;
        }

        //méthodes
            //ajouter un role
            public function addRoles():void{
        
                try{
                    
                    //récupérer les données
                    $nom = $this->nom_roles;
    
                    //préparer la requête
                    $req = $this->connexion()->prepare('INSERT INTO roles(nom_roles) VALUES(?)'); 
    
                    //binding des paramètres
                    $req->bindParam(1, $nom, \PDO::PARAM_STR);
    
                    //exécuter la requête
                    $req->execute();
    
                }
                catch(\Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }

            //vérifier si le rôle existe, récupérer un  rôle par son nom
            public function getRolesByName():?array{
                try{
                    //récupération des valeurs de l'objet
                    $nom = $this->nom_roles;
                    //préparation de la requête
                    $req = $this->connexion()->prepare('SELECT id_roles, nom_roles FROM roles WHERE nom_roles = ?');
                    $req->bindParam(1, $nom, \PDO::PARAM_STR);
                    ///exécution de la requête
                    $req->execute();
                    //récupération du résultat dans un tableau d'objets
                    $data = $req->fetchAll(\PDO::FETCH_OBJ);
                    return $data;
                }catch (\Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }

            public function __toString():string{
                return $this->nom_roles;
            }
        }


?>