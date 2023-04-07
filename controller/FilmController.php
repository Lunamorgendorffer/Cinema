<?php
require_once "bdd/DAO.php";
require_once "controller/RealisateurController.php";
require_once "controller/AcceuilController.php";

class FilmController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT f.id_film, f.titre From film f "; 

        $films= $dao->executerRequete($sql);

        require "view/film/listFilms.php";

    }

    public function findOneById($id){
        $dao = new DAO ();
       
        $sql= "SELECT f.id_film, f.titre, f.synopsis, f.duree, DATE_FORMAT(f.dateDeSortie,'%d/%m/%Y') AS dateDeSortie ,CONCAT( r.nom, r.prenom) as reali
            From film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur 
            INNER JOIN film_genre fg ON fg.id_film = f.Id_film
            INNER JOIN genre g ON g.id_genre = fg.id_genre
            WHERE f.id_film = :id 
        "; 

        $params =['id'=> $id];

        $casting = "SELECT c.Id_film, CONCAT(a.prenom,' ',a.nom) as acteur , r.nom
        FROM casting c 
        INNER JOIN film f ON f.Id_film = c.Id_film 
        INNER JOIN acteur a ON a.id_acteur = c.id_acteur
        INNER JOIN role r ON r.id_role = c.id_role
        WHERE f.id_film = :id";


        $film= $dao->executerRequete($sql);
        
        $casting= $dao->executerRequete($sql,$params);
        // $genres=$dao->executerRequete($sql);

        require "view/film/detailFilm.php";

    }
    

    //fonction pour gérer le traitement de la requête d'ajout de film
    public function addInput(){
        if(isset($_POST['submit'])){
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
            
            $dateDeSortie = $_POST['dateDeSortie'];

            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_FLOAT);

            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $realisateurs =$_POST['id_realisateur'];

            if($titre && $duree && $note && $synopsis && $realisateurs){



                $dao = new DAO();

                $sql = "INSERT INTO film (titre, synopsis, duree, dateDeSortie, note, id_realisateur) VALUES (:titre, :synopsis, :duree, :dateDeSortie, :note, :id_realisateur)";

                $params = [
                    "titre" => $titre,
                    "duree" => $duree,
                    "dateDeSortie" => $dateDeSortie,
                    "note" => $note,
                    "synopsis" => $synopsis,
                    "id_realisateur" => $realisateurs
                ];

                $films= $dao->executerRequete($sql, $params);
                
                $id_genre =  $_POST['id_genre'];
                
                $sql= "INSERT TO film_genre (id_genre,id_film) VALUES (:id_genre, LAST_INSERT_ID()) ";
                
                $params = [
                    "id_genre" => $id_genre,
                ];

                $genres=$dao->executerRequete($sql, $params);

                echo "vous avez ajouté un film avec succès";

                // require "view/film/ajouterFilm.php";

                header('Location: index.php?action=listFilms');

               

            } else {
                echo "Erreur 404
                ";
            }
        } else {
            echo "Pikachu";
        }
    }
    
}

?>