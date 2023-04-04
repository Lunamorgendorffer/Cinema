<?php
require_once "bdd/DAO.php";

class GenreController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT g.id_genre, g.nom_genre From genre g "; 

        $genres= $dao->executerRequete($sql);

        require "view/genre/listGenres.php";

    }

    public function findOneById($id){
        $dao = new DAO ();
       
        $sql= "SELECT g.id_genre, g.nom_genre From genre g "; 

        $genres= $dao->executerRequete($sql);

        require "view/genre/detailGenre.php";
        


    }

}

?>