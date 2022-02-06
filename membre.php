<?php

include("connect.php");
include("header.php");

// session_start();

// if(!$_SESSION["password"]){
    
//     header('Location: index.php');
// }


//********************* */ i    INSERER DONNEES USERS DANS LA BDD ******************
?>
<main>

    <h2>Inscription</h2>
    <form class="connectForm" action="" method = "post">

        <input type="text" name="pseudo" placeholder="Votre pseudo">
        <input type="password" name="mdp" placeholder="Votre mot de passe">
        <input type="password" name="mdp2" placeholder="Votre mot de passe">
        <input type="text" name="nom" placeholder="Votre nom">
        <input type="text" name="prenom" placeholder="Votre prénom">
        <input type="text" name="telephone" placeholder="Numero de téléphone">
        <input type="text" name="email" placeholder="E-mail">
        <select name="civilite" id="sex-select">
            <option value="M">Homme</option>
            <option value="F">Femme</option>
        </select>
        
        <input id= "add" type="submit" value="Envoyer">

    </form>
</main>

<?php

if(isset($_POST["pseudo"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["telephone"]) && isset($_POST["email"]) && isset($_POST["civilite"])) {

        $pseudo = $_POST["pseudo"]; 
        $mdp = $_POST["mdp"];
        $mdp2 = $_POST["mdp2"];
        $nom = $_POST["nom"]; 
        $prenom = $_POST["prenom"]; 
        $tel = $_POST["telephone"]; 
        $email = $_POST["email"];
        $civilite = $_POST["civilite"];

        if($mdp == $mdp2){

            $pass = md5($mdp);  
        }

        $pdo->query("INSERT INTO membre (pseudo, mdp, nom, prenom, telephone, email, civilite) 
        VALUES ('$pseudo', '$pass', '$nom', '$prenom', '$tel', '$email', '$civilite')");

}

include('footer.php');

?>
