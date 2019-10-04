<?php /*
 * page d'accueil si on est connecté
 */ ?>
<div class="d-flex">
    <?php
    include'template/part/button_accueil.php';
    ?>
</div>
<div class="d-flex flex-wrap">
    <div class='col-6'>
        <?php
        $fiche = new fiche();
        $result = $fiche->getListOfMine();
        include'template/part/myList.php';
        ?>
    </div>
    <div class='col-6'>
        <?php
        $fiche = new fiche();
        $result = $fiche->getListLastFich();
        include 'template/part/list_fiche.php';
        ?>
    </div>
    <div class='col-12'>
        <?php
        $favoris = new favoris();
        $result = $favoris->getListFavFich();
        include 'template/part/list_fiche_fav.php';
        ?>
    </div>
</div>