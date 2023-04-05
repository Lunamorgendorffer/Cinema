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
       
        $sql= "SELECT f.id_film, f.titre, f.synopsis, f.duree, DATE_FORMAT(f.dateDeSortie,'%d/%m/%Y') AS dateDeSortie , r.nom, r.prenom
            From film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur 
            INNER JOIN film_genre fg ON fg.id_genre = g.id_genre
            INNER JOIN genre g ON g.id_genre = fg.id_genre
            WHERE f.id_film = $id "; 

        $films= $dao->executerRequete($sql);
        $realisateurs= $dao->executerRequete($sql);

        require "view/film/detailFilm.php";

    }

    public function addInput(){


        if (isset($_POST['submit'])){
        
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
            
            $dateDeSortie =  $_POST['dateDeSortie'];
            
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_FLOAT);
            
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           
            $realisateur = $_POST['id_realisateur'];
            
            
            if($titre&&$duree&&$note&&$synopsis){
            
                $dao = new DAO();
                
                $sql = "INSERT INTO film (titre, synopsis, duree,dateDeSortie, note, id_realisateur) VALUES (:titre,:synopsis, :duree, :dateDeSortie, :note, :id_realisateur )";
              
   
                $params = [
                
                "titre" => $titre,
                
                "duree" => $duree,
                
                "dateDeSortie" => $dateDeSortie,
                
                "note" => $note,
                
                "synopsis" => $synopsis,

                "id_realisateur"  => $realisateur
                
                ];

                $dao->executerRequete($sql, $params);
                
                require "view/ajouter/ajouter.php";
            
            }else{
                echo "erreur 404";
            } 
        
        }else{
            echo " ta mere";
        }
        
    }
}

?>