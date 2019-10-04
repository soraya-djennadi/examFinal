<?php

/**
 * Description of user
 *
 * @author soraya
 */
class user {

//attribut
    protected $id;
    protected $pseudo;
    protected $mail;
    protected $password;
    protected $statut; //objet
    protected $date;

//methode
//getter

    public function getId() {
        if ($this->id) {
            return $this->id;
        } else {
            0;
        }
    }

    public function getPseudo() {
        if ($this->pseudo) {
            return $this->pseudo;
        } else {
            "";
        }
    }

    public function getMail() {
        if ($this->mail) {
            return $this->mail;
        } else {
            "";
        }
    }

    public function getPassword() {
        if ($this->password) {
            return $this->password;
        } else {
            "";
        }
    }

    public function getStatut() {
        if ($this->statut) {
            return $this->statut;
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

//setter
    public function setId($id) {
        $this->id = $id;
        return TRUE;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
        return TRUE;
    }

    public function setMail($mail) {
        $this->mail = $mail;
        return TRUE;
    }

    public function setPassword($password) {
        $this->password = $password;
        return TRUE;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
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
        $sql = "SELECT * FROM `user` WHERE `id`=:id";
        $req = $bdd->prepare($sql);
        $param = [":id" => $id];
        if (!$req->execute($param)) {
            debug("user->loadById : req->execute a echoue");
            return false;
        }
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $this->id = $ligne["id"];
        $this->pseudo = $ligne["pseudo"];
        $this->mail = $ligne["mail"];
        $this->password = $ligne["password"];
        $this->statut = $ligne["statut"];
        $this->date = $ligne["date"];
        return TRUE;
    }

    //construct
    public function __construct($id = null) {
        if ($id != 0) {
            $this->loadById($id);
        }
    }

    public function fromPost() {
        //mettre à jour les donnees en post
        if (!$this->setMail($_POST["mail"])) {
            debug("user->frompost : setmail retourn faux");
            return false;
        }
        if (!$this->setPseudo($_POST["pseudo"])) {
            debug("user->frompost : setpseudo retourn faux");
            return false;
        }
        if (!$this->setPassword($_POST["password"])) {
            debug("user->frompost : setpassword retourn faux");
            return false;
        }
        if (!$this->setStatut($_POST["statut"])) {
            debug("user->frompost : setstatut retourn faux");
            return false;
        }
        return true;
    }

    public function verifLogin() {
        //verifier les infos
        //return boolean
        //param neant
        $mail = $_POST["mail"];
        $password = $_POST["password"];
        global $bdd;
        $sql = "SELECT * FROM `user` WHERE `mail`=:mail";
        $req = $bdd->prepare($sql);
        $param = [":mail" => $mail];
        if (!$req->execute($param)) {
            debug("user->verifLogin a echoue");
            return false;
        }
        if (!$user = $req->fetch(PDO::FETCH_ASSOC)) {
            debug("user->verifLog :req->fetch a echoué");
            return false;
        }
        if (password_verify($password, $user["password"])) {
            $_SESSION["connected"] = true;
            $_SESSION["id"] = $user["id"];
            $_SESSION["statut"] = $user["statut"];
            $_SESSION["pseudo"] = $user["pseudo"];
            $_SESSION["mail"] = $user["mail"];
            $_SESSION["statut"] = $user["statut"];
            $_SESSION["date"] = $user["date"];
        }
        /*         * ******************************************************* */
        //verifier que le users n'est pas désactiver
        /*print_r($_SESSION["statut"]);
        if ($_SESSION["statut"] == 4) {
            echo" egale 4";
        } else {
            echo ' negale pas 4';
        }*/
        return true;
    }

    public function connection() {
        //role connecter le user
        //retour boolean
        //param
        if (isset($_SESSION["connected"]) || $_SESSION["connected"] === true) {
            return true;
        }
    }

    public function deconnection() {
        //role deconnexte le user
        //retour boolean
        //param neant
        $_SESSION["connected"] = FALSE;
        return true;
    }

    public function insert() {
        //role inserer une nouvel user dans la base
        //retour boolean
        //param neant
        global $bdd;
        $sql = "INSERT INTO `user` SET `mail`=:mail,"
                . "`pseudo`=:pseudo,"
                . "`password`=:password,"
                . "`date`= NOW(),"
                . "`statut`=:statut";
        $param = [":mail" => $_POST["mail"],
            ":pseudo" => $_POST["pseudo"],
            ":password" => password_hash($this->password, PASSWORD_DEFAULT),
            ":statut" => 1];
        $req = $bdd->prepare($sql);
        if (!$req->execute($param)) {
            debug("user->insert a echoue");
            return false;
        }
        if ($req->rowCount() === 1) {
            $this->id = $bdd->lastInsertId();
            return true;
        }
    }

    public function updateMail() {
        //modifier la fiche d'un abonne
        //retour boolean
        //parma neant
        global $bdd;
        $sql = "UPDATE `user` SET `mail`=:mail WHERE `id`=:id";
        $param = [":mail" => $_POST["mail"],
            ":id" => $_SESSION["id"]
        ];
        $req = $bdd->prepare($sql);
        if (!$req->execute($param)) {
            debug("user->update a echoue");
            return false;
        }
        return true;
    }

    public function updatePseudo() {
        //modifier la fiche d'un abonne
        //retour boolean
        //parma neant
        global $bdd;
        $sql = "UPDATE `user` SET `pseudo`=:pseudo WHERE `id`=:id";
        $param = [":pseudo" => $_POST["pseudo"],
            ":id" => $_SESSION["id"]
        ];
        $req = $bdd->prepare($sql);
        if (!$req->execute($param)) {
            debug("user->update a echoue");
            return false;
        }
        return true;
    }

    public function desactiverCompte() {
        //desactivé le compte
        global $bdd;
        $sql = "UPDATE `user` SET `statut`= 4 WHERE id=:id";
        $req = $bdd->prepare($sql);
        if (!$req->execute([":id" => $_SESSION["id"]])) {
            debug("statut->updateStatut a echoue()");
            return false;
        }
        return true;
    }

    public function reabonnement() {
        //reabonner un user
        //retour boolean
        //parma neant
        global $bdd;
        $sql = "UPDATE `user` SET `date`=NOW() WHERE `id`=:id";
        $param = [":id" => $_SESSION["id"]];
        $req = $bdd->prepare($sql);
        if (!$req->execute($param)) {
            debug("user->update a echoue");
            return false;
        }
        return true;
    }

    public function redirection() {
        include 'template/mep/header.php';
        include 'template/page/login.php';
        include 'template/mep/footer.php';
    }

//show
//controller
    /*     * ******************************************************************* */
    public function action_insert() {
        //mettre a jour les enttre en post
        if ($this->fromPost()) {
            if ($this->insert()) {
                include 'template/mep/headerCo.php';
                include 'template/page/accueil.php';
                return true;
            }
        }
        debug("user->action_insert a echoue");
        include'template/part/form_inscription.php';
    }

    public function action_connection() {
        if ($this->verifLogin()) {
            $user = $this;
            include 'template/mep/headerCo.php';
            include 'template/page/accueil.php';
            include 'template/mep/footer.php';
        } else {
            $this->redirection();
        }
    }

    public function action_connect() {
        //savoir si le user est connecté
        if ($this->connection()) {
            include 'template/page/accueil.php';
        } else {
            $this->redirection();
        }
    }

    public function action_deconnect() {
        //savoir si le user est connecté
        if ($this->deconnection()) {
            $this->redirection();
        } else {
            include 'template/mep/headerCo.php';
            include 'template/page/accueil.php';
        }
    }

    public function action_reabonnement() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            if ($this->reabonnement()) {
                include 'template/mep/headerCo.php';
                include 'template/part/reabonnement.php';
                include 'template/mep/footer.php';
            }
        }
    }

//show

    public function action_showProfil() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            $user = $this;
            include 'template/mep/headerCo.php';
            include 'template/page/profil_user.php';
        }
    }

    public function action_showFormUpdateMail() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            $user = $this;
            include 'template/mep/headerCo.php';
            include 'template/page/profil_user.php';
            include 'template/part/form_modif_mail.php';
            include 'template/part/button_autre_page.php';
        }
    }

    public function action_showFormUpdatePseudo() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            $user = $this;
            include 'template/mep/headerCo.php';
            include 'template/page/profil_user.php';
            include 'template/part/form_modif_pseudo.php';
            include 'template/part/button_autre_page.php';
        }
    }

    public function action_UpdatePseudo() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            if ($this->updatePseudo()) {
                $user = $this;
                include 'template/mep/headerCo.php';
                include 'template/part/modif_confirmer.php';
                include 'template/part/button_autre_page.php';
            } else {
                $user = $this;
                include 'template/mep/headerCo.php';
                include 'template/page/profil_user.php';
                include 'template/part/form_modif_pseudo.php';
                include 'template/part/button_autre_page.php';
            }
        }
    }

    public function action_UpdateMail() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            if ($this->updateMail()) {
                $user = $this;
                include 'template/mep/headerCo.php';
                include 'template/part/modif_confirmer.php';
                include 'template/part/button_autre_page.php';
            } else {
                $user = $this;
                include 'template/mep/headerCo.php';
                include 'template/page/profil_user.php';
                include 'template/part/Mail.php';
                include 'template/part/button_autre_page.php';
            }
        }
    }

    //reabonnement
    public function action_souhaitDesactivation() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            include 'template/mep/headerCo.php';
            include 'template/part/message_davertissement_desactivation.php';
            include 'template/part/button_autre_page.php';
        }
    }

    //reabonnement
    public function action_Desactivation() {
        if (!$this->connection()) {
            debug("user->action_insert : pas connecter");
            $this->redirection();
        } else {
            $this->desactiverCompte();
            include 'template/mep/header.php';
            include 'template/page/login.php';
        }
    }

    /*     * ******************************************************************* */

    public function action_showFormConnection() {
        include 'template/mep/header.php';
        include 'template/part/form_connection.php';
    }

    public function action_showFormInscription() {
        include 'template/mep/header.php';
        include 'template/part/form_inscription.php';
    }

}
