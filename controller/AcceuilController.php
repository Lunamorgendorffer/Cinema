<?php
require_once "bdd/DAO.php";

class AcceuilController{

    public function pageAccueil(){
        
        require "view/acceuil/home.php";

    }

    public function pageAjouter(){

        $dao = new DAO ();
        
        $sql = "SELECT * FROM realisateur r
        INNER JOIN film f ON f.id_realisateur = r.id_realisateur";
                
        $realisateurs= $dao->executerRequete($sql);
       
        $sql2 = "SELECT * FROM genre g";
        $genres= $dao->executerRequete($sql2);
        
        require "view/film/ajouterFilm.php";
    }

    

}