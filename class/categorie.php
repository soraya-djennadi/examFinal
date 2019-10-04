<?php

/**
 * Description of categorie
 *
 * @author soraya
 */
class categorie {

    //attribut
    protected $id;
    protected $libelle;

    //methode
    //getters
    public function getId() {
        if ($this->id) {
            return $this->id;
        } else {
            0;
        }
    }

    public function getLibelle() {
        if ($this->libelle) {
            return $this->libelle;
        } else {
            "";
        }
    }

    //setters
    public function setid($id) {
        $this->id = $id;
        return true;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return true;
    }

    //loadById
    public function loadById($id) {
        //role charger depuis l'id
        //retour boolen
        //param l'id en question
        global $bdd;
        $sql = "SELECT * FROM `categorie` WHERE `id`=:id";
        $req = $bdd->prepare($sql);
        $param = [":id" => $id];
        if (!$req->execute($param)) {
            debug("categorie->loadById : req->execute a echoue");
            return false;
        }
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $this->id = $ligne["id"];
        $this->libelle = $ligne["libelle"];
        return TRUE;
    }

    //construct
    public function __construct($id = null) {
        if ($id != 0) {
            $this->loadById($id);
        }
    }

    //controller
}
