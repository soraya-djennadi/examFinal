<?php
//charger le fichier init
include_once "lib/init.php";

//stocker les infos reçu en GET

$class = isset($_GET["class"]) ? $_GET["class"] : "";
$method = isset($_GET["method"]) ? $_GET["method"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";

//si la methode est vide
if (empty($method)) {
    //debug("index : method est vide");
    //executer la methode par defaut et donc charger l'objet duquel elle depend
    $user = new user();
    $user->redirection();
    exit;
}

//stocker la class dans une variable
$classe = "$class";
//si cette class existe
if (class_exists($classe)) {
    //debug("index : class existe");
    //charger cette class
    $obj = new $classe();
//sinon
} else {
    //debug("index : class n'existe pas");
    //executer la methode par defaut et donc charger l'objet duquel elle depend
    $user = new user();
    $user->redirection();
    exit;
}

//si l'id n'est pas vide
if (!empty($id)) {
    //debug("index : l'id n'est pas vide");
    //charger l'id
    $obj->loadById($id);
}

//stocker la method dans un variable avec l'action _
$methode = "action_$method";
//si la methode existe
if (method_exists($obj, $methode)) {
    //debug("index : la method existe");
    //executer la methode
    $obj->$methode();
//sinon charger une methode par defaut
} else {
    //debug("index : la methode n'existe pas");
    $user = new user();
    $user->redirection();
    exit;
}
?>