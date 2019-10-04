<?php

/* 
 * page pour test
 */

/***********************************************************************/

//permettre la modif selon statut
//pas fonctionnel


//si le statut de la personne connecté est expert et que l'user qui a poster l'article est abonné
$user->loadById($resul->getIdAuteur());$user->getStatut();
        if($_SESSION["statut"]===3 && 
                $resul->getStatut()===1){
    //alors le bouton modifier apparrait et est fonctionnel
            ?>
        <a href="index.php?class=fiche&method=updateFiche" class="card-link">Modifier</a>   
        <?php
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      ?>  