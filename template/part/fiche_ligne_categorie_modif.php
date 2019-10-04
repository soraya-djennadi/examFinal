<?php

/* 
 * liste des categories
 */
?>

<option selected="<?= $fiche->getCategorie() ?>" value="<?= $resultat->getId()?>"><?= $resultat->getLibelle() ?></option>