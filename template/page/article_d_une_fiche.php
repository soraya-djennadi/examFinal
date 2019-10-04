<?php
/*
 * 
 */
?>
<div class="card mb-3">
    <h3 class="card-header"><?= nl2br(htmlentities($fiche->getTitre())) ?></h3>
    <div class="card-body">
        <h5 class="card-title">Catégorie : <?= nl2br(htmlentities($fiche->getCategorie())) ?></h5>
        <h6 class="card-subtitle text-muted">poster par <?= nl2br(htmlentities($fiche->getAuteur())) ?></h6>
        <p class="card-text"><?= nl2br(htmlentities($fiche->getDate_saisie())) ?></p>
        <?php
        if (null !== nl2br(htmlentities($fiche->getDate_maj()))) {
            ?>
            <p class="card-text">Mise à jour le : <?= nl2br(htmlentities($fiche->getDate_maj())) ?></p>
            <?php
        }
        ?>
    </div>
    <?php
    if (!empty($fiche->getPhoto())) {
        ?>
        <img style="height: auto; width: 100%; display: block;" src="<?= $fiche->getPhoto() ?>" alt="Card image">        
        <?php
    }
    ?>
    <div class="card-body">
        <p class="card-text"><?= nl2br(htmlentities($fiche->getContenu())) ?></p>
    </div>
    <div class="card-body">
        <a href="index.php?class=favoris&method=addFavoris&id=<?= $fiche->getId() ?>" class="card-link">Ajouter en favoris</a>
        <a href="index.php?class=fiche&method=showFormUpdateFiche&id=<?= $fiche->getId() ?>" class="card-link">Modifier la fiche</a>

    </div>
    <?php
    //si des user l'ont ajouter en favoris mettre le nombre
    $favoris = new favoris();
    $results = $favoris->getFavoris($fiche->getId());
    if ($results != 0) {
        ?>

        <div class="card-body">
            <p class="card-text"><?= nl2br(htmlentities($results)) ?> personnes à mis cette fiche en favoris</p>
        </div>
        <?php
    }
    ?>
    <?php
    //si des user ont commenter la fiche les afficher
    //sinon afficher juste le formulaire pour mettre des commenatires
    $gestion_com = new gestion_com();
    $list = $gestion_com->getListCom($fiche->getId());
    ?>
    <div class="card-body">
        <div class="list-group">
            <?php
            if (!empty($list)) {
                foreach ($list as $listCom) {
                    ?>
                    <h5>Les commentaires</h5><?php
                    include 'template/part/list_com.php';
                }
            }
            ?>
        </div>
        <form method="POST" action="index.php?class=gestion_com&method=insert&id=<?= $fiche->getId() ?>" class="block">
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputEmail1">ajouter un commentaire</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" name="com">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </fieldset>
        </form>
    </div>

    <div class='d-flex'>
        <div style="width: 400px">
        </div>
        <div>
            <a class="btn btn-primary btn-lg btn-block" href="index.php?class=fiche&method=showFormresearch">rechercher une fiche</a>
        </div>
        <div style="width: 40px">
        </div>
        <div>
            <a class="btn btn-primary btn-lg btn-block" href="index.php?class=fiche&method=showFormInsertFiche">créer une nouvelle fiche</a>
        </div>
        <div style="width: 40px">
        </div>
        <div>
            <a class="btn btn-primary btn-lg btn-block" href="index.php?class=fiche&method=showAccueil">retourner à l'accueil</a>
        </div>  
        <div style="width: 400px">
        </div>  
    </div>
</div>



