<?php
/*
 * formulaire d'insertion d'une fiche
 */
?>
<form method="POST" action="index.php?class=fiche&method=updateFiche&id=<?= htmlentities($fiche->getId()) ?>"  enctype="multipart/form-data" class="block">
    <fieldset>
        <legend>Ajouter votre fiche</legend>
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name='titre' value="<?= htmlentities($fiche->getTitre()) ?>">
        </div>
        <div class="form-group">
            <label for="Select">Categorie</label>
            <select class="form-control" id="Select" name="categorie">
                <?php
                $result = $fiche->getListCat();
                foreach ($result as $resultat) {
                    include'template/part/fiche_ligne_categorie_modif.php';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Textarea1">contenu de votre fiche pratique</label>
            <textarea class="form-control" id="Textarea1" rows="3" name='contenu'><?=htmlentities($fiche->getContenu())?></textarea>
        </div>
        <div class="form-group">
            <label for="Textarea">petit resumé de votre fiche</label>
            <textarea class="form-control" id="Textarea" rows="3" name='resume'><?= htmlentities($fiche->getResume()) ?></textarea><small id="fileHelp" class="form-text text-muted">Celui-ci sera visible avnat d'ouvrir la fiche entière</small>
        </div>
        <div class="form-group">
            <label for="file">Ajoutez une photo si votre fiche n'en contenait pas ou modifier l'ancienne (nous n'acceptons que les format suivant : jpg, gif, png, bmp et gif)</label>
            <input type="file" class="form-control-file" id="file" name='photo'>
            <small id="fileHelp" class="form-text text-muted">La photo n'est pas une obligation mais peut aider à illustrer votre fiche</small>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
</fieldset>
</form>
        <a class="btn btn-primary" href="index.php?class=fiche&method=showAccueil">retour à l'accueil</a>