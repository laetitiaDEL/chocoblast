<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Connexion</title>
</head>
<body>
    <!--import du menu-->
    <?php include './App/Vue/viewMenu.php';?>
    <div class="form">
        <h3>Connexion</h3>
        <form action="" method="post">
            <label for="mail_utilisateur">Saisir mail : </label>
            <input type="email" name="mail_utilisateur">
            <label for="mail_utilisateur">Saisir mot de passe : </label>
            <input type="password" name="password_utilisateur">
            <input type="submit" value="Connecter" name="submit">
        </form>
    </div>
    <div id="error">
        <?php
            echo $msg;
        ?>
    </div>
</body>
</html>