<?php

class AcceuilController{

    public function pageAccueil(){
        
        require "view/acceuil/home.php";

    }

    public function pageAjouter(){

        $dao = new DAO ();
        
        $sql = "SELECT * FROM realisateur";
                
        $realisateurS= $dao->executerRequete($sql);
        
        require "view/ajouter/ajouter.php";
    }

    

}