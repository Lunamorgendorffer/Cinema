<?php
require_once "bdd/DAO.php";

class ActeurController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT a.prenom, a.nom, a.age From acteur a "; 

        $acteurs= $dao->executerRequete($sql);

        require "view/acteur/listActeurs.php";

    }

}

?>