<?php

include("header.php");
include("connect.php");

    $content="";

    if(isset($_POST['pseudo']) && isset($_POST['password'])) {
        $pseudo = $_POST["pseudo"];
        $results = $pdo->prepare('SELECT * FROM membre WHERE pseudo =:pseudo');
        $results->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $results->execute();
        if($results->rowCount() > 0) {
            $pass = md5($_POST["password"]);
            while ($user = $results->fetch()) {
                if ( $pass == $user["password"]) {
                    $content .= "<div class='alert'>Bonjour " . $pseudo . ", vous êtes bien connecté</div>";
                    session_start();
                    $_SESSION["pseudo"] = $user["pseudo"];
                    $_SESSION["password"] = $user["password"];
                    $_SESSION["nom"] = $user["nom"];
                    $_SESSION["prenom"] = $user["prenom"];
                    $_SESSION["telephone"] = $user["telephone"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["civilite"] = $user["civilite"];
                    $_SESSION["statut"] = $user["statut"];
                    $_SESSION["id"] = $user["id_membre"];
                    $admin = $user["statut"];
                    if ($admin == 1) {
                        header('Location: account.php');
                    } else {
                       header('Location: create.php');
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
        <form action="" method="post">
            <h2>Connexion</h2>

            <input type="text" name="pseudo" placeholder="Pseudo">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" value="Se connecter">

            <p><a href="create.php">Créer un compte</a></p>
        </form>
        <?php echo $content;?>
</main>

<?php

    include("footer.php");

?>