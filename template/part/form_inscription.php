<?php

/* 
 * formulaire d'inscription d'un user
 */
?>
<form method="POST" action="index.php?class=user&method=insert" class="block">
        <fieldset>
            <legend>Inscrivez vous afin d'avoir acces à toutes nos fiches pratique</legend>
            <div class="form-group">
                <label for="exampleInputEmail1">Votre adresse mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="adresse mail" name="mail">
                <small id="emailHelp" class="form-text text-muted">Nous ne partageons pas vos coordonnées.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Votre mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="mot de pass" name="password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Choississez un pseudo</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="votre pseudo" name="pseudo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
<div class='d-flex'>
    <div style="width: 400px">
    </div>
    <div>
        <a class="btn btn-primary btn-lg btn-block" href="index.php?class=fiche&method=showAccueil">retour à l'accueil</a>
    </div>
</div>