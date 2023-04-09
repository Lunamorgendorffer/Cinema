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
       
        $sql= "SELECT *
        From acteur a
        WHERE a.id_acteur = :id"
        ; 

        $sql2 = "SELECT r.nom as nom_personnage, f.titre ,DATE_FORMAT(f.dateDeSortie,'%d/%m/%Y') AS dateDeSortie, f.Id_film
        FROM acteur a 
        INNER JOIN casting c ON c.id_acteur = a.id_acteur
        INNER JOIN film f ON f.Id_film = c.id_film
        INNER JOIN role r ON r.id_role = c.id_role
        WHERE a.id_acteur = :id";

        $params =['id'=> $id];

        $casting= $dao->executerRequete($sql2,$params);
        $acteurs= $dao->executerRequete($sql,$params);

        require "view/acteur/detailActeur.php";


    }

    public function viewAddActor (){
        require "view/acteur/ajouterActeur.php";

    }

    public function addActor(){
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
                
                $acteur = $dao->executerRequete($sql, $params);

                header('Location:index.php?action=listActeurs');
            
            }else{
                echo "Erreur : tous les champs sont requis.";
            } 
        
        }else{
            echo "Le formulaire n'a pas été soumis.";
        }
        
    }

    public function deleteActor($id){
        $dao = new DAO;

        $sql="DELETE FROM acteur WHERE id_acteur = :id ";

        $params = ['id' => $id];

        $delete=  $dao->executerRequete($sql,$params);

        header("location:index.php?action=listsActeurs");
    }

}

?>