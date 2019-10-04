<?php
/*
 * ligne du tableau list
 */
?>
<div class="card mb-3">
    <h3 class="card-header"><?= $resul->getTitre() ?></h3>
    <div class="card-body">
        <h5 class="card-title">Catégorie : <?= $resul->getCategorie() ?></h5>
        <h6 class="card-subtitle text-muted">poster par <?= $resul->getAuteur() ?></h6>
        <p class="card-text"><?= $resul->getDate_saisie() ?></p>
        <?php
        if (null !== $resul->getDate_maj()) {
            ?>
            <p class="card-text">Mise à jour le : <?= $resul->getDate_maj() ?></p>
            <?php
        }
        ?>
    </div>
    <?php
    if (!empty($resul->getPhoto())) {
        ?>
        <img style="height: auto; width: 100%; display: block;" src="<?= $resul->getPhoto() ?>" alt="Card image">        
        <?php
    }
    ?>
    <div class="card-body">
        <p class="card-text"><?= $resul->getResume() ?></p>
    </div>
    <div class="card-body">
        <a href="index.php?class=favoris&method=addFavoris&id=<?= $resul->getId() ?>" class="card-link">Ajouter en favoris</a>
        <a href="index.php?class=fiche&method=showCart&id=<?= $resul->getId() ?>" class="card-link">En savoir +</a>

    </div>
    <?php
    //si des user l'ont ajouter en favoris mettre le nombre
    $favoris = new favoris();
    $results = $favoris->getFavoris($resul->getId());
    if ($results != 0) {
        ?>

        <div class="card-body">
            <p class="card-text"><?= $results ?> personnes à mis cette fiche en favoris</p>
        </div>
        <?php
    }
    ?>
    <?php
    //si des user ont commenter la fiche les afficher
    //sinon afficher juste le formulaire pour mettre des commenatires
    $gestion_com = new gestion_com();
    $list = $gestion_com->getListCom($resul->getId());
    ?>
    <div class="card-body">
        <div class="list-group">
            <?php
            if (!empty($list)) {
                    ?>
                    <h5>Les commentaires</h5><?php
                foreach ($list as $listCom) {
                    include 'template/part/list_com.php';
                }
            }
            ?>
        </div>
        <form method="POST" action="index.php?class=gestion_com&method=insert&id=<?= $resul->getId() ?>" class="block">
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputEmail1">ajouter un commentaire</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  value="" name="com">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </fieldset>
        </form>
    </div>
</div>