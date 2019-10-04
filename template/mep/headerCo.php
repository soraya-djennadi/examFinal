<!DOCTYPE html>
<!--
header commun a toute les page non connecter
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://bootswatch.com/4/sandstone/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <header><nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php?class=fiche&method=showAccueil">mes fiches jardinages</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?class=fiche&method=showAccueil">Accueil<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?class=fiche&method=showList">Liste des derniers ajouts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?class=fiche&method=showFormInsertFiche">ajouter une fiche</a>
                        </li>
                    </ul>
                    <ul class=" my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?class=user&method=deconnection">se déconnecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?class=user&method=showProfil&id=<?=$_SESSION["id"]?>">mon compte</a>
                        </li>
                    </ul>
                </div>
            </nav></header>
        <img src="img/principale(2).jpg" class="slider" alt=""style="height: auto;width: 100%;"/>
        <main class="container">