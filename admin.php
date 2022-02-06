<?php

    include("header.php");

    if(!$_SESSION["statut"]==1)
    {
        header('Location: index.php');
        exit();
}

?>

    <div class="gestionAdmin">
        <a href="annonce.php">Gestion annonces</a>
        <a href="categorie.php">Gestion catégories</a>
        <a href="membre.php">Gestion membres</a>
        <a href="note.php">Gestion notes</a>
        <a href="commit.php">Gestion commentaires</a>
        <a href="stats.php">Gestion statistiques</a>
    </div>

<?php include("footer.php");?>