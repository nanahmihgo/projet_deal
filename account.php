<?php


include ("connect.php");
include ("header.php");
include ("main.php");
include ("footer.php");

    if(!$_SESSION["statut"]){
        header('Location: index.php');

}

?>


