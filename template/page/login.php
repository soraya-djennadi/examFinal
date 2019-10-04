<?php
/*
 * formulaire d'inscription de connection
 */
?>
<div class='block'>
    <form method="POST" action="index.php?class=user&method=connection" class="">
        <fieldset>
            <legend>Connectez vous à votre compte</legend>
            <div class="form-group">
                <label for="exampleInputEmail1">Votre adresse mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="adresse mail" name="mail">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Votre mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="mot de pass" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>    
<div class="alert alert-dismissible alert-info">
    <p><a href="index.php?class=user&method=showFormInscription" class="alert-link">Rejoingnez nous</a>, rien de plus simple, souscrivez à notre abonnement annuel de seulement 99€ et ainsi avoir accès à toute les fiches pratique de nos abonnés.</p>
<a href="index.php?class=user&method=showFormInscription" class="btn btn-primary">s'inscrire</a>
</div>