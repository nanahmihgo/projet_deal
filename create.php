<?php

include("header.php");
include("connect.php");

// function show($variable): void {
//     $html = '<pre>';
//     $html .= print_r($variable, true);
//     $html .= '</pre><br><br>';

//     echo $html;
    
// }

//********************* */ i    INSERER DONNEES USERS DANS LA BDD ******************
?>

<main>

    <form id= "add" action="" method = "post">

        <input type="text" name="pseudo" placeholder="Votre pseudo"><br><br>
        <input type="password" name="mdp" placeholder="Votre mot de passe"><br><br>
        <input type="password" name="ConfirmMdp" placeholder="Confirmez votre mdp"><br><br>
        <input type="text" name="nom" placeholder="Votre nom"><br><br>
        <input type="text" name="prenom" placeholder="Votre prénom"><br><br>
        <input type="text" name="telephone" placeholder="Numero de téléphone"><br><br>
        <input type="text" name="email" placeholder="E-mail"><br><br>
        <select name="civilite" id="pet-select">
            <option value="">Selectionnez le sexe</option>
            <option value="M">Homme</option>
            <option value="F">Femme</option>
        </select><br><br>
        
        <input id= "add" type="submit" value="Envoyer"><br><br>
    </form>

</main>



<?php

if(!empty($_POST)){

    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $nom = htmlspecialchars($_POST["nom"]); 
    $prenom = htmlspecialchars($_POST["prenom"]); 
    $email = htmlspecialchars($_POST["email"]); 
    $tel = htmlspecialchars($_POST["telephone"]);
    $civ = htmlspecialchars($_POST["civilite"]);

    $error = array();

        if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
            $error['pseudo'] = "Veuillez entrer un pseudo valide";
            
        }
        elseif(empty($_POST['mdp']) || $_POST['mdp'] != $_POST['ConfirmMdp']){
            $error['mdp'] = "Veuillez entrer un mot de passe valide";
            show($error);
        }   
        elseif(empty($_POST['nom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['nom'])){
            $error['nom'] = "Veuilliez entrer votre nom";
            
        }
        elseif(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['prenom'])){
            $error['prenom'] = "Veuillez entrer votre prénom";
            
        }
        elseif(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error['email'] = "votre email n'est pas valide";
            show($error);
        }   
        elseif(empty($_POST['telephone'] || !is_numeric($tel))){
            $error['telephone'] = "Veuillez entrer un numero de telephone ";
            show($error);
        }

        elseif(empty($_POST['civilite'])){
            $error['civilite'] = "Veuillez selectionnez le sexe";
            show($error);
        }

        else{

            $pdo->query("INSERT INTO membre (pseudo, mdp, nom, prenom, email, telephone, civilite )VALUES(
                '$pseudo', '$mdp', '$nom', '$prenom', '$email', '$tel', '$civ' )");
        }
};

    include("footer.php")

?>