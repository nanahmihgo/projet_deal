<?php

require_once ('connect.php');
require_once('header.php');


    $content="";

    if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
        $pseudo = $_POST["pseudo"];
        $results = $pdo->prepare('SELECT * FROM membre WHERE pseudo =:pseudo');
        $results->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $results->execute();
        if($results->rowCount() > 0) {

            $pass = ($_POST["mdp"]);

            while ($user = $results->fetch()) 
            {

                if ($pass == $user["mdp"])
                 {
                    $content .= "<div class='alert'>Bonjour " . $pseudo . ", vous êtes bien connecté</div>";

                    session_start();
                    $_SESSION["pseudo"] = $user["pseudo"];
                    $_SESSION["mdp"] = $user["mdp"];
                    $_SESSION["nom"] = $user["nom"];
                    $_SESSION["prenom"] = $user["prenom"];
                    $_SESSION["telephone"] = $user["telephone"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["civilite"] = $user["civilite"];
                    $_SESSION["statut"] = $user["statut"];
                    $_SESSION["id"] = $user["id"];
                    $admin = $user["statut"];
                    if ($admin == 1)
                    {
                        header('Location:admin.php');
                    } else 
                    {
                       header('Location:index.php');
                    }
                } else {
                    $content .= "<div class='alert'>Vous avez entré un mot de passe erroné</div>";
                }
            }
        } else {
            $content .= "<div class='alert'>Votre identifiant n'existe pas</div>";
        }
    }
?>

    <main> 
        <h2>Connexion</h2>        
                <form class="connectForm" action="#" method="POST">
                    <input type="text" name="pseudo"  placeholder="Votre pseudo">
                    <input type="password" name="mdp" placeholder="Votre mot de passe">              
                    <button type="submit">Valider</button>
                </form>
    </main>

    <?php
    include('footer.php');