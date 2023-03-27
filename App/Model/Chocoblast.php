<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Utilisateur;

    class Chocoblast extends BddConnect{
        //Attributs
        private ?int $id_chocoblast;
        private ?string $slogan_chocoblast;
        private ?string $date_chocoblast;
        private ?bool $statut_chocoblast;
        private ?Utilisateur $cible_chocoblast;
        private ?Utilisateur $auteur_chocoblast;

        //Constructeur
        public function __construct(){
            $this->cible_chocoblast = new Utilisateur();
            $this->auteur_chocoblast = new Utilisateur();
            //passer le statut à true 
            $this->statut_chocoblast = true;
        }

        //Getters et setters
        public function getIdChocoblast():?int{
        return $this->id_chocoblast;
        }
        public function getSloganChocoblast():?string{
        return $this->slogan_chocoblast;
        }
        public function getDateChocoblast():?string{
        return $this->date_chocoblast;
        }
        public function getStatutChocoblast():?bool{
        return $this->statut_chocoblast;
        }
        public function getCibleChocoblast():?Utilisateur{
        return $this->cible_chocoblast;
        }
        public function getAuteurChocoblast():?Utilisateur{
        return $this->auteur_chocoblast;
        }

        public function setIdChocoblast(?int $id):void{
            $this->id_chocoblast = $id;
        }
        public function setSloganChocoblast(?string $slogan):void{
            $this->slogan_chocoblast = $slogan;
        }
        public function setDateChocoblast(?string $date):void{
            $this->date_chocoblast = $date;
        }
        public function setStatutChocoblast(?bool $statut):void{
            $this->statut_chocoblast = $statut;
        }
        public function setCibleChocoblast(?Utilisateur $cible):void{
            $this->cible_chocoblast = $cible;
        } 
        public function setAuteurChocoblast(? Utilisateur $auteur):void{
            $this->auteur_chocoblast = $auteur;
        }  
        
        
        //Méthodes

        //ajouter un chocoblast
        public function addChocoblast():void{
            
            try{
                
                //récupérer les données
                $slogan = $this->getSloganChocoblast();
                $date = $this->getDateChocoblast();
                $statut = $this->getStatutChocoblast();
                //récupération de la cible et de l'auteur
                $cible = $this->getCibleChocoblast()->getIdUtilisateur();
                $auteur = $this->getAuteurChocoblast()->getIdUtilisateur();

                //préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO chocoblast(slogan_chocoblast, date_chocoblast, statut_chocoblast, cible_chocoblast, auteur_chocoblast) VALUES(?,?,?,?,?)'); 

                //binding des paramètres
                $req->bindParam(1, $slogan, \PDO::PARAM_STR);
                $req->bindParam(2, $date, \PDO::PARAM_STR);
                $req->bindParam(3, $statut, \PDO::PARAM_BOOL);
                $req->bindParam(4, $cible, \PDO::PARAM_INT);
                $req->bindParam(5, $auteur, \PDO::PARAM_INT);

                //exécuter la requête
                $req->execute();

            }
            catch(\Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        //récupérer la liste des chocoblasts
        public function getChocoblastAll():?array{
            try{
                $req = $this->connexion()->prepare('SELECT id_chocoblast, slogan_chocoblast, date_chocoblast,  nom_auteur, prenom_auteur, nom_cible, prenom_cible FROM chocoblast 
                INNER JOIN vwCible ON cible_chocoblast = vwcible.id_cible 
                INNER JOIN vwAuteur ON auteur_chocoblast = vwauteur.id_auteur');
                $req->execute();
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                asort($data);
                return $data;
            }catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        //méthode toString
        public function __toString():string{
            return $this->slogan_chocoblast;
        }

    }



?>