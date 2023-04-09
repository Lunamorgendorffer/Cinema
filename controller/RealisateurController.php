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
       
        $sql= "SELECT r.id_realisateur, r.prenom, r.nom, r.age, r.sexe, r.nationalite,  r.biographie
        From realisateur r 
        WHERE r.id_realisateur = :id
        "; 

        $sql2 = "SELECT r.nom as nom_personnage, f.titre ,DATE_FORMAT(f.dateDeSortie,'%d/%m/%Y') AS dateDeSortie, f.Id_film
        FROM acteur a 
        INNER JOIN casting c ON c.id_acteur = a.id_acteur
        INNER JOIN film f ON f.Id_film = c.id_film
        INNER JOIN role r ON r.id_role = c.id_role
        WHERE a.id_acteur = :id";

        $params =['id'=> $id];

        $realisateurs= $dao->executerRequete($sql,$params);
        $castings= $dao->executerRequete($sql2,$params);

        require "view/realisateur/detailRealisateur.php";


    }

    public function viewPageRealisateur(){
        require "view/acteur/ajouterRealisateur.php";

    }

    public function addRealisateur(){


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
                
                header('Location:index.php?action=listActeurs');
            
            }else{
                echo "Erreur : tous les champs sont requis.";
            } 
        
        }else{
            echo "Le formulaire n'a pas été soumis.";
        }
        
    }

    public function deleterealisateur($id){
        $dao = new DAO;

        $sql="DELETE FROM realisateur WHERE id_realisateur = :id ";

        $params = ['id' => $id];

        $delete=  $dao->executerRequete($sql,$params);

        header("location:index.php?action=listsRealisateurs");
    }


}

?>