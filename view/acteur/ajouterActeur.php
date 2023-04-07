<?php

ob_start();
require_once "controller/ActeurController.php"; 

?>
<h3 class="mb-5 mt-5" >Ajouter un acteur</h3>
<div class="container mb-5">
    <div class="row g-0">
        <form action="index.php?action=ajouterFilm" method="post">
            <div class="row">
                <div class="mb-5 col-4">
                    <label  class="form-label" >Nom</label>
                    <input class="form-control" type="text" name="nom" required>
                </div>
                <div class="mb-5 col-4">
                    <label class="form-label" >Prenom</label>
                    <input class="form-control" type="text" name="prenom"  required>
                </div>
                <div class="mb-5 col-4">
                    <label class="form-label">Age</label>
                    <input class="form-control" type="int" name="age" required>
                </div>
                <div class="mb-5 col-4">
                    <label  class="form-label" >Nationalité</label>
                    <input class="form-control" type="text" name="nationalite" required>
                </div>
            </div>
            
            <div class="row d-flex justify-content-evenly">
                <div class="mb-5 col-6 ">
                    <label for="formGroupExampleInput" class="form-label">Nom du personnage jouer</label>
                    <input name="nom_personnage" type="text" class="form-control" required="required">
                </div>
                <select name="id_film" class="form-select form-select-lg mb-5 text-center col-7 ">
                    <option selected>Choisissez le film correspondant</option>
                    <?php foreach($films as $film) : ?>
                    <option value="<?= $film['Id_film']?>"><?=$film['titre']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="d-flex justify-content-evenly">
                <button class="btn btn-primary mb-5 " name="submit" type="submit">Ajouter</button>
            </div> 
       </form>
    </div>
</div>


<?php

$title="Ajout"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";