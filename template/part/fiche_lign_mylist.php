<?php
/*
 * ligne de ma list
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
        <a href="index.php?class=fiche&method=showCart&id=<?= $resul->getId() ?>" class="card-link">En savoir +</a>
        <a href="index.php?class=fiche&method=showFormUpdateFiche&id=<?= $resul->getId() ?>" class="card-link">Modifier</a>   
            <?php
            $favoris= new favoris();
            $results=$favoris->getFavoris($resul->getId());
            
        if($results!=0){
            ?>
        <p class="card-text"><?= $results ?> personnes à mis cette fiche en favoris</p>
        <?php
        }
        ?>
    </div>
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
                foreach ($list as $listCom) {
                    ?>
                    <h5>Les commentaires</h5><?php
                    include 'template/part/list_com.php';
                }
            }
            ?>
        </div>
        
    </div>
</div>