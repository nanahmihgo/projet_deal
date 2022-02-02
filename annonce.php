<?php

include("header.php");
include("connect.php");

?>

<div class="annonceMain">

    <h2>Déposez votre annonce !</h2>

    <form action="" method="POST" enctype='multipart/form-data' class="annonceForm">
    
        <div class=annElemts>
            <label for="titre">Titre:</label>
            <input type="text" name="titre" class="titre">
        </div>
        <div class="annElemts">
            <label for="categorie">description courte:</label>
            <input type="text" name="description_courte" class="categorie">
        </div>
        <div class="annElemts">
            <label for="desc">Description:</label>
            <input type="text" name="description_longue" class="desc">
        </div>
        <div class="annElemts">
            <label for="prix">prix €:</label>
            <input type="text" name="prix" class="prix">
        </div>    
        <div class="annElemts">
            <label for="photo">Photos:</label>
            <input type="text" name="photo">
        </div>
        <div class="annElemts">
            <label for="adress">Adresse:</label>
            <input type="text" name="adresse" class="adress">
        </div>
        <div class="annElemts">
            <label for="cp">Code postal:</label>
            <input type="text" name="cp" class="cp">
        </div>
        <div class="annElemts">
            <label for="ville">Ville:</label>
            <input type="text" name="ville" class="ville">
        </div>
        <div class="annElemts">
            <label for="pays">Pays:</label>
            <input type="text" name="pays" class="pays">
        </div>

        <input id= "add" type="submit" value="Envoyer">

    </form>

</div>

<?php

// if(isset($_POST["titre"]) && isset($_POST["description_courte"]) && isset($_POST["description_longue"]) && isset($_POST["prix"]) && isset($_FILES["photo"]) && isset($_POST["pays"]) && isset($_POST["ville"]) && isset($_POST["adresse"]) && isset($_POST["cp"]) && isset($_POST["membre_id"])&& isset($_POST["photo_id"]) && isset($_POST["categorie_id"])){


if($_POST){
 
    $titre = $_POST["titre"];
    $descC = $_POST["description_courte"];
    $descL = $_POST["description_longue"];
    $prix = $_POST["prix"];
    $img = $_POST["photo"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
    $adress = $_POST["adresse"];
    $cp = $_POST["cp"];

    $resultMembre = $pdo->query("SELECT id_membre FROM membre");
    $resultImg = $pdo->query("SELECT id_photo FROM photo");
    $resultCat = $pdo->query("SELECT id_categorie FROM categorie");
    
    $pdo->query("INSERT INTO annonce (titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp, membre_id, photo_id, categorie_id) 
    VALUES ('$titre', '$descC', '$descL', '$prix', '$img', '$pays', '$ville', '$adress', '$cp', '$resultMembre', '$resultImg', '$resultCat')");
}
  
include("footer.php");

?>