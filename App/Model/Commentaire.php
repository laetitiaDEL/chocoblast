<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Utilisateur;
    use App\Model\Chocoblast;

    class Commentaire extends BddConnect{
        //Attributs
        private ?int $id_commentaire;
        private ?string $note_commentaire;
        private ?string $text_commentaire;
        private ?string $date_commentaire;
        private ?string $statut_commentaire;
        private ?Chocoblast $chocoblast;
        private ?Utilisateur $auteur;

        //Constructeur
        public function __construct(){
            $this->chocoblast = new Chocoblast;
            $this->auteur = new Utilisateur;
        }

        //Getters et setters 
        public function getIdCommentaire():int{
            return $this->id_commentaire;
        }
        public function getNoteCommentaire():string{
            return $this->note_commentaire;
        }
        public function getTextCommentaire():string{
            return $this->text_commentaire;
        }
        public function getDateCommentaire():string{
            return $this->date_commentaire;
        }
        public function getStatutCommentaire():string{
            return $this->statut_commentaire;
        }
        public function getChocoblastCommentaire(){
            return $this->chocoblast;
        }
        public function getAuteurCommentaire(){
            return $this->auteur;
        }

        public function setNoteCommentaire(){
            
        }


        //Méthodes

    }


?>