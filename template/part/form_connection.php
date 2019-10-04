<?php

/* 
 * formulaire de connection d'un user
 */

?>
    <form method="POST" action="index.php?class=user&method=connection" class="block">
        <fieldset>
            <legend>Connectez vous à votre compte</legend>
            <div class="form-group">
                <label for="exampleInputEmail1">Votre adresse mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="adresse mail" name="mail">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Votre mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="mot de passe" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>