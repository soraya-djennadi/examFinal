<?php

/* 
 * Formulaire de modifiaction de l'adresse mail
 */
?>
<form method="POST" action="index.php?class=user&method=updateMail&id=<?= $user->getId() ?>" class="block">
        <fieldset>
            <legend>Modification du mail</legend>
            <div class="form-group">
                <label for="Email">Votre adresse mail</label>
                <input type="email" class="form-control" id="Email" value="<?= $user->getMail() ?>" name="mail">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </fieldset>
    </form>