<?php

/* 
 * liste de mes article
 */

?>

<div class="block col-12">
    <?php
    if (empty($result)) {
        ?>
        <p>Ecrivez votre première fiche et ainsi <strong>partager vos connaissance avec la communauté</strong></p>
        <a href="index.php?class=fiche&method=showFormInsertFiche" class="btn btn-success">Ajouter un article</a>
        <?php
    } else {?>
        <h2>Vos fiches</h2>
            <?php
        foreach ($result as $resul) {
            include 'template/part/fiche_lign_mylist.php';
        }
    }
    ?>


</div>
