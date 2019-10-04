<?php
/*
 * list correzspondant à la recherche
 */
?>

<div class="block">
    <?php
    if (empty($result)) {
        ?>
        <p><strong>Aucun article ne correspond à votre recherche </strong>faites une recherche différentes ( exemple : avec un seul mot)</p><p>Si la recherche n'abouti toujours, je crains que nous n'ayons pas de fiche à ce sujet</p>
        <a href="index.php?class=fiche&method=showFormResearch" class="btn btn-primary">Effectuer une nouvelle recherche</a>
        <a href="index.php?class=fiche&method=showFormInsertFiche" class="btn btn-success">Ajouter un article</a>
        <?php
    } else {
        foreach ($result as $resul) {
            include 'template/part/fiche_lign_list_fich.php';
        }
    }
    ?>


</div>