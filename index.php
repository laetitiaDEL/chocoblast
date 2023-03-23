<?php

use App\Controller\RolesController;
use App\Controller\UserController;

    //attention à l'ordre des includes, en fonction de qui dépend de qui (qui extend qui)
    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    include './App/Model/Roles.php';
    include './App/Controller/RolesController.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    $userController = new UserController();
    $rolesController = new RolesController();

    //routeur
    switch ($path) {
        case '/chocoblast/':
            include './App/Vue/home.php';
            break;
        case '/chocoblast/userAdd':
            //appel de la fonction insertUser
            $userController->insertUser();
            break;
        case '/chocoblast/rolesAdd':
            //appel de la fonction insertRoles
            $rolesController->insertRoles();
            break;
        default:
            include './App/Vue/error.php';
            break;
    }
?>