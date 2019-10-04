<?php

/* 
 * liste des commentaire par fiche
 */

?>
    <div class="alert alert-dismissible alert-light">
      <h6 class="mb-1"><?= $listCom->getAuteur() ?> <small><?= $listCom->getDate() ?></small></h6>
      
    <p class="mb-1"><?= $listCom->getCom() ?></p>
    </div>
