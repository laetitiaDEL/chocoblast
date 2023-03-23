<?php
    namespace App\Utils;
    class Fonctions{
        public static function cleanInput($value){
            //nettoyage des entrées de formulaire
            return htmlspecialchars(strip_tags(trim($value)));
        }
    }



?>