<?php

    include ("connect.php");

?>


<main>

    <h2>Découvrez nos produits !</h2>

    <section>

        <div class="index_search">
            <select class="form-select" aria-label="Default select example">
                <option selected>Catégories</option>
                <option value="car">Véhicule</option>
                <option value="house">Immobilier</option>
                <option value="mutlmedia">Multimédia</option>
                <option value="holidays">Vacance</option>
            </select>

            <form action="" method="post" class="search">
                <input type="search" name="recherche" placeholder="Que recherchez-vous ?">
                <input type="search" name="recherche" placeholder="Saisissez une ville">
                <button>Rechercher</button>
                <i class="fas fa-search"></i>
            </form>
        </div>

        <div id="slider">
            <div id="btnLeft"><</div>
                <img src="./img/eclair.jpg" alt="Opera" id="slide">
            <div id="btnRight">></div>
        </div>

    </section>

</main>