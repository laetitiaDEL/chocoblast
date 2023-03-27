<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Ajouter un Chocoblast</title>
</head>
<body>
    <!--import du menu-->
    <?php include './App/Vue/viewMenu.php';?>
    <div class="form">
        <form action="" method="post">
            <label for="slogan_chocoblast">Slogan : </label>
            <input type="text" name="slogan_chocoblast">

            <label for="date_chocoblast">Date : </label>
            <input type="date" name="date_chocoblast">

            <label for="statut_chocoblast">Statut : </label>
            <input type="" name="statut_chocoblast">

            <label for="cible_chocoblast">Cible : </label>
            <select name="cible_chocoblast">
                <!--générer la liste des utilisateurs en PHP-->
                <?php

                    foreach($data as $value){
                        echo '<option value='.$value->id_utilisateur.'>'.$value->nom_utilisateur.'</option>';
                    }

                ?>

            <input type="submit" value="Ajouter" name="submit">
        </form>
    </div>
    <div id="error">
        <?php
            echo $msg;
        ?>
    </div>
</body>
</html>