<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Ajouter un Role</title>
</head>
<body>
    <!--import du menu-->
    <?php include './App/Vue/viewMenu.php';?>
    <div class="form">
        <h3>Ajouter un rôle</h3>
        <form action="" method="post">
            <label for="nom_roles">Saisir role : </label>
            <input type="text" name="nom_roles">
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