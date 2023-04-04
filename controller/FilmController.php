<?php
require_once "bdd/DAO.php";

class FilmController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT f.id_film, f.titre From film f "; 

        $films= $dao->executerRequete($sql);

        require "view/film/listFilms.php";

    }

    public function findOneById($id){
        $dao = new DAO ();
       
        $sql= "SELECT f.id_film, f.titre, f.synopsis, f.duree, f.dateDeSortie, f.id_realisateur  
            From film f
            WHERE f.id_film = $id "; 

        $films= $dao->executerRequete($sql);

        require "view/film/detailFilm.php";


    }

}

?>