nl2br(htmlentities(<?php
/*
 * information lieé a la personne connecter
 */
?>
<div class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">
        <h1>Mon compte</h1>
        <p><?= nl2br(htmlentities($user->getPseudo())) ?>
        <a class="card-title" href="index.php?class=user&method=showFormUpdatePseudo&id=<?= $_SESSION["id"] ?>">Modifier mon pseudo</a></p>
        <p><?= nl2br(htmlentities($user->getMail())) ?> 
            <a class="card-title" href="index.php?class=user&method=showFormUpdateMail&id=<?= $_SESSION["id"] ?>">Modifier mon email</a></p>
        <p>Date de souscription à l'abonnement <?= nl2br(htmlentities($user->getDate())) ?></p>
    </div>
    <div class="card-body">
        <a class="card-text btn btn-success" href="index.php?class=user&method=reabonnement&id=<?= $_SESSION["id"] ?>">renouveller mon abonnement</a>
        <a class="card-text btn btn-outline-danger" href="index.php?class=user&method=souhaitDesactivation&id=<?= $_SESSION["id"] ?>">Désactiver votre compte</a>
    </div>
    <a class="nav-link btn btn-primary" href="index.php?class=fiche&method=showAccueil">retour à l'accueil</a>
</div>

<div>
    <a class="btn btn-primary btn-lg btn-block" href="index.php?class=user&method=showProfil&id=<?= $_SESSION["id"] ?>">retourner sur mon compte</a>
</div> 