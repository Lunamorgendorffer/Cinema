<?php
require_once "bdd/DAO.php";

class ActeurController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT a.id_acteur, a.prenom, a.nom From acteur a "; 

        $acteurs= $dao->executerRequete($sql);

        require "view/acteur/listActeurs.php";

    }

    public function findOneById($id){
        $dao = new DAO ();
       
        $sql= "SELECT a.id_acteur, a.prenom, a.nom, a.age From acteur a
            WHERE a.id_acteur = $id "; 

        $acteurs= $dao->executerRequete($sql);

        require "view/acteur/detailActeur.php";


    }

}

?>