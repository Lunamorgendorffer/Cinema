<?php
require_once "bdd/DAO.php";

class RealisateurController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT r.prenom, r.nom, r.age From realisateur r "; 

        $realisateurs= $dao->executerRequete($sql);

        require "view/realisateur/listRealisateurs.php";

    }

}

?>