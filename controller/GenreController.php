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

    public function addInput(){


        if (isset($_POST['submit'])){
        
            $nom_genre = filter_input(INPUT_POST, "nom_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            
            
            if($nom_genre){
            
                $dao = new DAO();
                
                $sql = "INSERT INTO genre (nom_genre ) VALUES (:nom_genre )";
   
                $params = ["nom_genre" => $nom_genre ];

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