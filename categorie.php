<?php

    include("connect.php");
    include("header.php");

    if(!$_SESSION["statut"]==1)
    {
        header('Location: index.php');
        exit();
}

?>

<main>

    <h2>catégories</h2>

    <form action="" method="post" class="formCat">
        <div class=annElemts>
            <label for="titre">Titre:</label>
            <input type="text" name="titre" class="titre">
        </div>
        <div class=annElemts>
            <label for="motsCles">Mots clés:</label>
            <input type="text" name="mots_cles" class="motsCles">
        </div>
        <input type="submit">
    </form>

<?php

    $result = $pdo->query("SELECT * FROM categorie");
    while ($donnees = $result->fetch())
{
?>

    <table>
        <tr>
            <td><?php echo $donnees['id_categorie'];?></td>
            <td><?php echo $donnees['titre'];?></td> 
            <td><?php echo $donnees['mots_cles'];?></td>
        </tr>    
    </table>

    
    <?php 
}
$result->closeCursor(); // Termine le traitement de la requête


if(isset($_POST["titre"]) && isset($_POST["mots_cles"])) {
    
    $titre = htmlspecialchars($_POST["titre"]); 
    $mCles = htmlspecialchars($_POST["mots_cles"]);
    
    $pdo->query("INSERT INTO categorie (titre, mots_cles) VALUES ('$titre', '$mCles')");
}
?>

</main>

<?php include("footer.php");?>