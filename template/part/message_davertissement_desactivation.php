<?php
/*
 * message d'avertissement de desactivation de compte
 */
?>
<div class="alert alert-dismissible alert-warning">
    <h1>Vous souhaitez déactiver votre compte?</h1>
    <strong>Attention</strong>
    <p>Si vous désactiver votre compte vous n'y aurez plus accès</p>
    <a href="index.php?class=user&method=showProfil&id=<?= $_SESSION["id"] ?>" class="btn btn-success">Annuler</a>
    <a href="index.php?class=user&method=desactivation" class="btn btn-danger">Confirmer</a>
</div>
<div>
    <a class="btn btn-primary btn-lg btn-block" href="index.php?class=user&method=showProfil&id=<?= $_SESSION["id"] ?>">retourner sur mon compte</a>
</div> 