<?php 
// je demande le fichier physique ou j'utilise un autoloader 
require_once "controller/AcceuilController.php";
require_once "controller/ActeurController.php"; 
require_once "controller/FilmController.php"; 
require_once "controller/GenreController.php";
require_once "controller/RealisateurController.php";

// j'instancie les controlleurs 
$ctrlFilm = new FilmController(); 
$ctrlAccueil = new AcceuilController();
$ctrlActeur = new ActeurController(); 
$ctrlGenre = new GenreController(); 
$ctrlRealisateur = new RealisateurController(); 

// je switch entre différents case 
// si j'ai une "action "dans l'URL , cette action donnera accès à un controlleur et à la fonction demandée (si elle existe) 
if(isset($_GET['action'])){ 
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    // car possible d'injecter du code malveillant dans l'URL 
    switch($_GET['action']){ 
        case "listFilms" : 
            $ctrlFilm->findAll(); 
        break; 
        
        case "detailFilm" : 
            $ctrlFilm->findOneById($id); 
        break;

        case "ajouterFilm" : 
            $ctrlFilm->addInput(); 
        break;

        case "listGenres" : 
            $ctrlGenre->findAll(); 
        break; 

        case "detailGenre" : 
            $ctrlGenre->findOneById($id); 
        break;

        case "ajouterGenre" : 
            $ctrlGenre->addInput(); 
        break;

        case "listRealisateurs" : 
            $ctrlRealisateur->findAll(); 
        break; 

        case "ajouterReal" : 
            $ctrlRealisateur->addInput(); 
        break;

        case "detailRealisateur" : 
            $ctrlRealisateur->findOneById($id); 
        break; 

        case "listActeurs" : 
            $ctrlActeur->findAll(); 
        break;

        case "detailActeur" : 
            $ctrlActeur->findOneById($id); 
        break; 

        case "ajouterActeur" : 
            $ctrlActeur->addInput(); 
        break;

        case "home" : 
            $ctrlAccueil->pageAccueil(); 
        break; 

        case "pageAjouter": 
            $ctrlAccueil->pageAjouter();
        break;

    } 
}else{ 
    $ctrlAccueil->pageAccueil(); 
    // ma page par défault si l'action demandée n'est pas trouvée 
}