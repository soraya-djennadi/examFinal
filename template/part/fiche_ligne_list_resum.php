<?php
/*
 * ligne du tableau ficher resumer pour user no connecter
 */
?>
<div class="card mb-3 block">
    <h3 class="card-header"><?= $resultat->getTitre() ?></h3>
    <div class="card-body">
        <h5 class="card-title">Catégorie : <?= $resultat->getCategorie() ?></h5>
        <h6 class="card-subtitle text-muted">poster par <?= $resultat->getAuteur() ?></h6>
        <p class="card-text"><?= $resultat->getDate_saisie() ?></p>
        <?php
        if (null !== $resultat->getDate_maj()) {
            ?>
            <p class="card-text">Mise à jour le : <?= $resultat->getDate_maj() ?></p>
            <?php
        }
        ?>
    </div><?php
    if (!empty($resultat->getPhoto())) {
        ?>
        <img style="height: auto; width: 100%; display: block;" src="<?= $resultat->getPhoto() ?>" alt="Card image">        
        <?php
    }
    ?>
    <div class="card-body">
        <p class="card-text"><?= $resultat->getResume() ?></p>
    </div>
    <div class="card-body">
        <a href="index.php?class=favoris&method=addFavoris&id=<?= $resultat->getId() ?>" class="card-link">Ajouter en favoris</a>
        <a href="index.php" class="card-link">En savoir +</a>
            <?php
            $favoris= new favoris();
            $results=$favoris->getFavoris($resultat->getId());
            
        if($results!=0){
            ?>
        <p class="card-text"><?= $results ?> personnes à mis cette fiche en favoris</p>
        <?php
        }
        ?>
    </div>
</div>
