<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Tous les chocoblasts</title>
</head>
<body>
    <!--import du menu-->
    <?php include './App/Vue/viewMenu.php';?>

    <!--générer la liste des utilisateurs en PHP-->
    <?php

        foreach($choco as $value){
            echo '<h3>'.$value->slogan_chocoblast.'</h3><p>'.$value->prenom_auteur.' '.$value->nom_auteur.' a chocoblasté '.$value->prenom_cible.' '.$value->nom_cible.' !!</p><p>'.$value->date_chocoblast.'</p>';
        }

    ?>


    <div id="error">
        <?php
            echo $msg;
        ?>
    </div>
</body>
</html>