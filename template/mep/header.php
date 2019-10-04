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
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?class=fiche&method=showAccueil">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?class=fiche&method=showAboutUs">a propos de nous</a>
                        </li>
                    </ul>
                    <ul>
                        <li class="">
                            <a class="btn btn-outline-danger" href="index.php?class=user&method=showFormConnection">se connecter</a>
                        </li>
                    </ul>
                </div>
            </nav></header>
        <img src="img/principale(2).jpg" class="slider" alt=""style="height: auto;width: 100%;"/>
        <main class="container">