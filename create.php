<?php

include("connect.php");


if($_POST){

        $pseudo = $_POST["pseudo"]; 
        $mdp = $_POST["mdp"];
        $nom = $_POST["nom"]; 
        $prenom = $_POST["prenom"]; 
        $tel = $_POST["telephone"]; 
        $email = $_POST["email"]; 
        $civ = $_POST["civilite"];


    };

$pdo->query("INSERT INTO membre (pseudo, mdp, nom, prenom, email, telephone, civilite )VALUES(
        '$pseudo', '$mdp', '$nom', '$prenom', '$email', '$tel', '$civ' )");

?>

<form id= "add" action="" method = "post">

    <input type="text" name="pseudo" placeholder="Votre pseudo">
    <input type="password" name="mdp" placeholder="Votre mot de passe">
    <input type="text" name="nom" placeholder="Votre nom">
    <input type="text" name="prenom" placeholder="Votre prénom">
    <input type="text" name="telephone" placeholder="Numero de téléphone">
    <input type="text" name="email" placeholder="E-mail">
    <select name="civilite" id="pet-select">
        <option value="M">Homme</option>
        <option value="F">Femme</option>
    </select>

    <input id= "add" type="submit" value="Envoyer">
    </form>

<?php

