<?php
require_once "bdd/DAO.php";
require_once "controller/RealisateurController.php";
require_once "controller/AcceuilController.php";

class FilmController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT f.id_film, f.titre, f.affiche From film f "; 

        $films= $dao->executerRequete($sql);

        require "view/film/listFilms.php";

    }

    public function findOneById($id){
        $dao = new DAO ();
       
        $sql= "SELECT f.id_film, f.titre, f.synopsis,f.affiche, f.duree, DATE_FORMAT(f.dateDeSortie,'%d/%m/%Y') AS dateDeSortie ,f.note,CONCAT( r.nom, r.prenom) as reali
            From film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur 
            INNER JOIN film_genre fg ON fg.id_film = f.id_film
            INNER JOIN genre g ON g.id_genre = fg.id_genre
            WHERE f.id_film = :id 
        "; 

        $params =['id'=> $id];

        $casting = "SELECT CONCAT(a.nom,' ', a.prenom) as acteur , r.nom, a.id_acteur, c.id_film 
        FROM acteur a 
        INNER JOIN casting c ON c.id_acteur = a.id_acteur
        INNER JOIN film f ON f.id_film = c.id_film 
        INNER JOIN role r ON r.id_role = c.id_role
        WHERE f.id_film = :id";


        $film= $dao->executerRequete($sql,$params);
        
        $casting= $dao->executerRequete($casting,$params);
        // $genres=$dao->executerRequete($sql);

        require "view/film/detailFilm.php"; 

    }

    

    //fonction pour gérer le traitement de la requête d'ajout de film
    public function addFilm(){
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
                
                $sql1= "INSERT INTO film_genre (id_genre,id_film) VALUES (:id_genre, LAST_INSERT_ID()) ";
                
                $params = [
                    "id_genre" => $id_genre,
                ];

                $genres=$dao->executerRequete($sql1, $params);

                echo "vous avez ajouté un film avec succès";

                // require "view/film/ajouterFilm.php";

                header('Location: index.php?action=listFilms');

            } else {
                echo "Erreur : tous les champs sont requis.";
            }
        } else {
            echo "Le formulaire n'a pas été soumis.";
        }
    }

    public function deleteFilm($id){
        // $id = $_GET['id']; 
        
        $dao = new DAO;
        
        $sql1="DELETE FROM film_genre WHERE id_film = :id ";
        $sql2 = "DELETE FROM casting WHERE id_film = :id ";
        $sql3 = "DELETE FROM film WHERE id_film = :id "; 
        

        $params = ['id' => $id];

        $delete=  $dao->executerRequete($sql1,$params);
        $casting = $dao->executerRequete($sql2, $params);
        $films = $dao->executerRequete($sql3, $params);
        
        echo "vous avez supprimé un film avec succès";

        header("location:index.php?action=listsFilms");
    }

    public function viewAddCasting (){
        $dao = new DAO();
        $sql = "SELECT * FROM acteur a";
       
        $acteurs= $dao->executerRequete($sql);
       
        $sql2 = "SELECT * FROM role r";
        
        $roles= $dao->executerRequete($sql2);
        require "view/film/ajouterCasting.php";

    }

    public function addCasting(){
        if (isset($_POST['submit'])){
        
            $id_acteur = $_POST['id_acteur'];
            
            $id_role = $_POST['id_role'];

            $id_film = $_POST['id_film'];
            
            
            if($id_role&&$id_acteur){
            
                $dao = new DAO();
                
                $sql = "INSERT INTO casting (id_film, id_acteur, id_role) VALUES (:id_film, :id_acteur, :id_role )";
             

                $params = [
                "id_role" => $id_role,
                "id_acteur" => $id_acteur,
                "id_film" => $id_film
                
                ];
                
                $acteur = $dao->executerRequete($sql, $params);

                header('Location:index.php?action=detailfilm');
            
            }else{
                echo "Erreur : tous les champs sont requis.";
            } 
        
        }else{
            echo "Le formulaire n'a pas été soumis.";
        }
        
    }



    
}

?>