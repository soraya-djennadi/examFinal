<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
/* 
 * chargement des info neccesaire
 */

include "lib/debug.php";
//ouvrir la base de donnee
global $bdd;
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=djennadi;charset=UTF8","djennadi","Amazon42");
//ouvrir la session
session_start();
//inclure les classes
include_once 'class/gestion_com.php';
include_once 'class/categorie.php';
include_once 'class/favoris.php';
include_once 'class/fiche.php';
include_once 'class/user.php';
