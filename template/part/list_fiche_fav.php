<?php
/*
 * list correzspondant à la recherche
 */
?>

<div class="block col-12">
    <?php
    if (empty($result)) {
        ?>
        <p>Mettez des fiches pratiques en favoris</p><p>Vous les aurez toujours a disposition sur votre ecran d'accueil et donc d'y avoir accès à tous moment <br><strong>Essayez</strong></p>
        <a href="index.php?class=fiche&method=showFormResearch" class="btn btn-primary">Effectuer une recherche</a>
        <a href="index.php?class=fiche&method=showList" class="btn btn-success">Afficher la liste des article</a>
        <?php
    } else {?>
        <h2>Vos fiches favorites</h2>
            <?php
        foreach ($result as $resul) {
            include 'template/part/fiche_lign_list_fich.php';
        }
    }
    ?>
</div>