<?php
/*
 * list de fiche 
 *  titre
 * resumer
 * photo
 * auteur
 * date_maj
 * categorie
 */
?><div class="block">
    <?php
    foreach ($result as $resultat) {
        include 'template/part/fiche_ligne_list_resum.php';
    }
    ?>


</div>