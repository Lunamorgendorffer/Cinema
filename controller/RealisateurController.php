<?php
require_once "bdd/DAO.php";

class RealisateurController{

    public function findAll(){

        $dao = new DAO ();
       
        $sql= "SELECT r.id_realisateur, r.prenom, r.nom From realisateur r "; 

        $realisateurs= $dao->executerRequete($sql);

        require "view/realisateur/listRealisateurs.php";

    }
    public function findOneById($id){
        $dao = new DAO ();
       
        $sql= "SELECT r.id_realisateur, r.prenom, r.nom, r.age From realisateur r "; 

        $realisateurs= $dao->executerRequete($sql);

        require "view/realisateur/detailRealisateur.php";


    }

    public function addInput(){


        if (isset($_POST['submit'])){
        
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            
            if($nom&&$prenom){
            
                $dao = new DAO();
                
                $sql = "INSERT INTO realisateur (nom, prenom ) VALUES (:nom,:prenom )";
   
                $params = [
                
                "nom" => $nom,
                
                "prenom" => $prenom
                
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