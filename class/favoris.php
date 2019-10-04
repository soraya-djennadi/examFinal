<?php

/**
 * Description of favoris
 *
 * @author soraya
 */
class favoris {

    //attributs
    protected $id;
    protected $user; //objet
    protected $fiche; //objet

    //methode
    //getters

    public function getId() {
        if ($this->id) {
            return $this->id;
        } else {
            0;
        }
    }

    public function getUser() {
        if ($this->user) {
            $user = new user($this->user);
            return $user->getPseudo();
        }
    }

    public function getFiche() {
        if ($this->fiche) {
            $fiche = new fiche($this->fiche);
            return $fiche->getId();
        }
    }

    //setters
    public function setId($id) {
        $this->id = $id;
        return true;
    }

    public function setUser($user) {
        $this->user = $user;
        return true;
    }

    public function setFiche($fiche) {
        $this->fiche = $fiche;
        return true;
    }

    //loadById
    public function loadById($id) {
        //role charger depuis l'id
        //retour boolen
        //param l'id en question
        global $bdd;
        $sql = "SELECT * FROM `favoris` WHERE `id`=:id";
        $req = $bdd->prepare($sql);
        $param = [":id" => $id];
        if (!$req->execute($param)) {
            debug("favoris->loadById : req->execute a echoue");
            return false;
        }
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $this->id = $ligne["id"];
        $this->user = $ligne["user"];
        $this->fiche = $ligne["fiche"];
        return TRUE;
    }

    //construct
    public function __construct($id = null) {
        if ($id != 0) {
            $this->loadById($id);
        }
    }

    //getList
    public function getList() {
        //role lister des favoris par fiche
        //retour tableau
        //param 
        $sql = "SELECT * FROM `favoris` WHERE `fiche`=:fiche";
        $req = $bdd->prepare($sql);
        if (!$req->execute([":fiche" => $_GET['id']])) {
            debug("favoris->getList a echoué");
            return [];
        }
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $fiche = new fiche();
            $fiche->loadById($ligne["id"]);
            $result[] = $fiche;
        }
        return $result;
    }

//insert
    public function insert() {
        //role inserer une nouveau favoris
        //retour boolean
        //param 
        global $bdd;
        $sql = "INSERT INTO `favoris` SET `user`=:user,"
                . "`fiche`=:fiche";
        $param = [":user" => $_SESSION["id"],
            ":fiche" => $_GET["id"]];
        $req = $bdd->prepare($sql);
        if (!$req->execute($param)) {
            debug("favoris->insert a echoue");
            return false;
        }
        if ($req->rowCount() === 1) {
            $this->id = $bdd->lastInsertId();
            return true;
        }
    }

    //nbre de favoris par fiche
    public function getFavoris($id) {
        //compter le nbre de favoris par fiche
        //nbre de favori
        //l'id de la fiche
        global $bdd;
        $sql = "SELECT COUNT(*) AS 'calcul' FROM `favoris` WHERE `id` = :id";
        $req = $bdd->prepare($sql);
        if (!$req->execute([":id" => $id])) {
            debug("favoris->getFavoris a echouer");
            return 0;
        }
        $lign = $req->fetch(PDO::FETCH_ASSOC);
        return $lign["calcul"];
    }

    public function getListFavFich() {
        //role lister mes fiches favoris
        //retour tableau
        //param neant
        global $bdd;
        $sql = "SELECT * FROM `fiche` LEFT JOIN favoris ON fiche.id = favoris.fiche WHERE favoris.user=:user";
        $param = [":user" => $_SESSION["id"]];
        $req = $bdd->prepare($sql);
        if (!$req->execute($param)) {
            debug("favoris->getListfavfich a echoué");
            return [];
        }
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $fiche = new fiche();
            $fiche->loadById($ligne["id"]);
            $result[] = $fiche;
        }
        if (empty($result)) {
            return $result = [];
        }
        return $result;
    }

    //controller
    public function action_addFavoris() {
        $user = new user();
        if (!$user->connection()) {
            debug("user->action_search : pas connecter");
            $user->redirection();
        } else {
            if ($this->insert()) {
                include 'template/mep/headerCo.php';
                include 'template/page/accueil.php';
                include 'template/mep/footer.php';
            }
        }
    }

}
