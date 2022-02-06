<?php

    include("header.php");
    include("connect.php");

    if(!$_SESSION["statut"]==1)
    {
        header('Location: index.php');
        exit();
}

    function show($variable): void {
        $html = '<pre>';
        $html .= print_r($variable, true);
        $html .= '</pre><br><br>';

        echo $html;
}


    $resultMembre = $pdo->query("SELECT id_membre FROM membre");
    $resultImg = $pdo->query("SELECT id_photo FROM photo");
    $resultCat = $pdo->query("SELECT id_categorie FROM categorie");

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
        <select name="categorie" id="categorie">
            <option value="">Toutes les catégories</option>
            <?php 
            $results = $pdo->query("SELECT * FROM categorie");
            while($item = $results->fetch()) {
                echo "<option value=".  $item["id_categorie"] . ">" .  $item["titre"] ."</option>";
            }
            ?>
        </select>

        <input id= "add" type="submit" value="Envoyer">

    </form>

</div>

<?php



if(isset($_POST["titre"]) && isset($_POST["description_courte"]) && isset($_POST["description_longue"]) && isset($_POST["prix"]) && isset($_FILES["photo"]) && isset($_POST["pays"]) && isset($_POST["ville"]) && isset($_POST["adresse"]) && isset($_POST["cp"])) 

{
    $titre = $_POST["titre"];
    $descC = $_POST["description_courte"];
    $descL = $_POST["description_longue"];
    $prix = $_POST["prix"];
    $img = $_POST["photo"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
    $adress = $_POST["adresse"];
    $cp = $_POST["cp"];
    
    
    $pdo->query("INSERT INTO annonce (titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp) 
    VALUES ('$titre', '$descC', '$descL', '$prix', '$img', '$pays', '$ville', '$adress', '$cp')");

}

show($resultCat);


// include("footer.php");

?>
