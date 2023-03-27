<?php
    if(isset($_SESSION['connected'])){
?>

<!--Menu si connecté-->
            <div id="navbar">
                <li><a href="./">Home</a></li>
                <li><a href="./chocoblastAdd">Ajouter un chocoblast</a></li>
                <li><a href="./chocoblastAll">Tous les chocoblasts</a></li>
                <li><a href="./deconnexion">Déconnexion</a></li>
            </div>

<?php
    } else {
?>

<!--Menu si déconnecté-->
        <div id="navbar">
            <li><a href="./">Home</a></li>
            <li><a href="./userAdd">Inscription</a></li>
            <li><a href="./rolesAdd">Ajouter un rôle</a></li>
            <li><a href="./chocoblastAll">Tous les chocoblasts</a></li>
            <li><a href="./connexion">Connexion</a></li>
        </div>

<?php
    }
?>