<?php

/* 
 * Formulaire de modifiaction de l'adresse mail
 */
?>
<form method="POST" action="index.php?class=user&method=updatePseudo&id=<?= $user->getId() ?>" class="block">
        <fieldset>
            <legend>Modification du mail</legend>
            <div class="form-group">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" class="form-control" id="pseudo"  value="<?= $user->getPseudo() ?>" name="pseudo">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </fieldset>
    </form>