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

    public function addInput(){


        if (isset($_POST['submit'])){
        
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $age= filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
            
            $nationalite = filter_input(INPUT_POST, "nationalite", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($nom&&$prenom&&$age&&$nationalite){
            
                $dao = new DAO();
                
                $sql = "INSERT INTO acteur (nom, prenom, age, nationalite ) VALUES (:nom,:prenom, :age, :nationalite )";
   
                $params = [
                
                "nom" => $nom,
                
                "prenom" => $prenom,
                
                "age" => $age,
                "nationalite"=>$nationalite
                
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