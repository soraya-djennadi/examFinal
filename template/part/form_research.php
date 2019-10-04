<?php

/* 
formulaire de recherche
 */
?>


<form method="POST" action="index.php?class=fiche&method=search" class="block">
  <fieldset>
    <legend>rechercher une fiche</legend>
    <div class="form-group">
      <label for="">Rechercher par mot-clef</label>
      <input type="text" class="form-control" id="" name="motClef" placeholder="">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>