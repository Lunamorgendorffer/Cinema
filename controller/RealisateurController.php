<?php
require_once "bdd/DAO.php";

class RealisateurController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT r.id_realisateur, r.prenom, r.nom From realisateur r "; 

        $realisateurs= $dao->executerRequete($sql);

        require "view/realisateur/listRealisateurs.php";

    }
    public function findOneById($id){
        $dao = new DAO ();
       
        $sql= "SELECT r.id_realisateur, r.prenom, r.nom, r.age From realisateur r "; 

        $realisateurs= $dao->executerRequete($sql);

        require "view/realisateur/detailRealisateur.php";


    }

}

?>