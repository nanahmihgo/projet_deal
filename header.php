<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DEAL</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>


        <header>
            <h1>DEAL</h1>
            <nav>

                <?php

                    if(isset($_SESSION['pseudo']))
                    {
                        echo '<a href="index.php">Accueil</a>';
                        echo '<a href="deconnexion.php">Se déconnecter</a>';
                    }
                    else
                    {
                        // echo '<a href="index.php">Accueil</a>';
                        echo '<a href="connexion.php">Connecter</a>';
                        echo '<a href="inscription.php">Inscription</a>';
                    }

                ?>

            </nav>
        </header>
