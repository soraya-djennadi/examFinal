<?php

/**
 * Description of gestion_com
 *
 * @author soraya
 */
class gestion_com {

    //attribut
    protected $id;
    protected $com; //obj
    protected $fiche; //obj
    protected $auteur; //obj
    protected $date;

    //method

    public function getId() {
        if ($this->id) {
            return $this->id;
        } else {
            0;
        }
    }

    public function getCom() {
        if ($this->com) {
            return $this->com;
        } else {
            "";
        }
    }

    public function getFiche() {
        if ($this->fiche) {
            $fiche = new fiche($this->fiche);
            return $fiche->id;
        } else {
            "";
        }
    }

    public function getAuteur() {
        if ($this->auteur) {
            $user = new user($this->auteur);
            return $user->getPseudo();
        } else {
            "";
        }
    }

    public function getDate() {
        if ($this->date) {
            return $this->date;
        } else {
            "";
        }
    }

    public function setId($id) {
        $this->id = $id;
        return TRUE;
    }

    public function setCom($com) {
        $this->com = $com;
        return TRUE;
    }

    public function setFiche($fiche) {
        $this->fiche = $fiche;
        return TRUE;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
        return TRUE;
    }

    public function setDate($date) {
        $this->date = $date;
        return TRUE;
    }

    //loadById
    public function loadById($id) {
        //role charger depuis l'id
        //retour boolen
        //param l'id en question
        global $bdd;
        $sql = "SELECT * FROM `gestion_com` WHERE `id`=:id";
        $req = $bdd->prepare($sql);
        $param = [":id" => $id];
        if (!$req->execute($param)) {
            debug("gestion_com->loadById : req->execute a echoue");
            return false;
        }
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $this->id = $ligne["id"];
        $this->com = $ligne["com"];
        $this->fiche = $ligne["fiche"];
        $this->auteur = $ligne["auteur"];
        $this->date = $ligne["date"];
        return TRUE;
    }

    //construct
    public function __construct($id = null) {
        if (isset($id)) {
            $this->loadById($id);
        }
    }

    public function getListCom($cart) {
        //role lister les com par fiche
        //retour tableau
        //param $fiche = fiche de ses com
        global $bdd;
        $sql = "SELECT * FROM `gestion_com` WHERE `fiche` = :fiche ORDER BY date DESC";
        $req = $bdd->prepare($sql);
        if (!$req->execute([":fiche" => $cart])) {
            debug("gestion_com->getListCom a echoué");
            return [];
        }
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $gestion_com = new gestion_com();
            $gestion_com->loadById($ligne["id"]);
            $result[] = $gestion_com;
        }
        if (empty($result)) {
            return $result = [];
        }
        return $result;
    }

    //insert
    public function insert() {
        //role inserer une nouveau favoris
        //retour boolean
        //param 
        global $bdd;
        $sql = "INSERT INTO `gestion_com` SET `auteur`=:auteur, "
                . "`fiche`=:fiche, "
                . "`com`=:com,"
                . "date = NOW()";
        $param = [":auteur" => $_SESSION["id"],
            ":fiche" => $_GET["id"],
            ":com" => $_POST["com"]];
        $req = $bdd->prepare($sql);
        if (!$req->execute($param)) {
            debug("gestion_com->insert a echoue");
            return false;
        }
        if ($req->rowCount() === 1) {
            $this->id = $bdd->lastInsertId();
            return true;
        }
    }

    //controller
    public function action_insert() {
        //page d'insertion de fiche
        $user = new user();
        if (!$user->connection()) {
            debug("user->action_insert : pas connecter");
            $user->redirection();
        }
        if ($this->insert()) {
            include 'template/mep/headerCo.php';
            include 'template/page/accueil.php';
            include 'template/mep/footer.php';
        } else {
            echo"fail";
            include 'template/mep/headerCo.php';
            include 'template/page/accueil.php';
            include 'template/mep/footer.php';
        }
    }

}
