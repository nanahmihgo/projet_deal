<?php 

include ("connect.php");
session_start();


if(!empty($_POST)){


    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mdp = htmlspecialchars($_POST["password"]);
    $nom = htmlspecialchars($_POST["nom"]); 
    $prenom = htmlspecialchars($_POST["prenom"]); 
    $email = htmlspecialchars($_POST["email"]); 
    $tel = htmlspecialchars($_POST["telephone"]);
    $civ = htmlspecialchars($_POST["civilite"]);

    $error = array();

if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
    $error['pseudo'] = "Veuillez entrer un pseudo valide";
    
}
elseif(empty($_POST['mdp']) || $_POST['mdp'] != $_POST['password2']){
    $error['mdp'] = "Veuillez entrer un mot de passe valide";  
}   
elseif(empty($_POST['nom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['nom'])){
    $error['nom'] = "Veuilliez entrer votre nom";
    
}
elseif(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['prenom'])){
    $error['prenom'] = "Veuillez entrer votre prénom";
    
}
elseif(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $error['email'] = "votre email n'est pas valide";   
}   
elseif(empty($_POST['telephone'] || !is_numeric($tel))){
    $error['telephone'] = "Veuillez entrer un numero de telephone ";   
}

elseif(empty($_POST['civilite'])){
    $error['civilite'] = "Veuillez selectionnez le sexe";
    
}


            $pass = md5($mdp);
            $pdo->query("UPDATE membre SET password='$pass' WHERE id='$pseudo'");

            header('Location: index.php');

        }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        
        <form action="" method="POST">    
        <div class="container">
            <h2>Vos informations</h2>

        <input readonly type="text" name="id_membre" placeholder="id_membre">
        
        <label class="label">Pseudo</label>
        
        <input type="text" name="pseudo" placeholder="Entrer votre nouveau pseudo" value="">

        <label for="pass">Mot de passe</label>
        
        
        
        <input type="password" name="password" placeholder="Entrer votre ancien mot de passe">
        
        <input type="password" name="password2" placeholder="Entrer votre nouveau mot de passe">
        
        <input type="password" name="password2" placeholder="Confirmer votre nouveau mot de passe">

        <label class="label">Civilité</label>

        <input type="text" name="nom" placeholder="nom">

        <input type="text" name="prenom" placeholder="prenom">
        
        <label class="label">Téléphone</label>
        
        <input type="text" name="telephone" placeholder="Entrer votre nouveau n° de téléphone" value="">
        
                <label class="label">Email</label>
                
                <input type="text" name="email"placeholder="Modifier votre adresse mail" value="">

                <input type="text" name="email"placeholder="Confirmer votre adresse mail" value="">

        <label class="label">Autres informations</label>
        
        <select name="civilite" id="civilite-select">
            <option value="">--Choisissez votre sexe--</option>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>    
        </select>

        
        <input readonly type="text" name="statut" placeholder="Statut">
        
        <input readonly type="text" name="date_enregistrement" placeholder="date_enregistrement">

        <button>Mettre à jour mes informations</button> 
        

    </div>
</form>
    </header>
</body>
</html>

<?php

$results = $pdo->query("SELECT * FROM membre");

echo "<div class='container'>";

while($item = $results->fetch()) {
    // echo "<input>";
    // echo "<img src= '" . $item["photo"] . "'alt='ma photo'>" . "<br>";
    echo $item["pseudo"] . "<br><br>";
    echo $item["pseudo"] . "<br><br>";
    echo $item["password"] . "<br><br>";
    echo $item["nom"]. "<br><br>";
    echo $item["prenom"] . "<br><br>";
    echo $item["email"] . "<br><br>";
    echo $item["telephone"] . "<br><br>";
    echo $item["civilite"] . "<br><br>";
    echo "<placeholder>";
}

// echo "</input>"; 



