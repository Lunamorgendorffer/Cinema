<?php

ob_start();

?>

<h3 class="mb-5 mt-5" >Ajouter film </h3>
<div class="container mb-5">
    <div class="row g-0">
        <form action="index.php?action=ajouterFilm" method="post">
            <div class="row">
                <div class="mb-5 col-4">
                    <label  class="form-label" >Titre</label>
                    <input class="form-control" type="text" name="titre" id="titre">
                </div>
                <div class="mb-5 col-4">
                    <label class="form-label" >Durée en minutes</label>
                    <input class="form-control" type="int" name="duree" >
                </div>
                <div class="mb-5 col-4">
                    <label class="form-label">Note sur 5:</label>
                    <input class="form-control" type="float" name="note" id="note" >
                </div>
            </div>
            <div class="row d-flex justify-content-evenly">
                <div class="mb-5 col-12">
                        <label class="form-label" >Date de sortie:</label>
                        <input class="form-control" type="date" name="dateDeSortie" >
                </div>
                <div class="mb-5 col-12">
                    <label class="form-label">Synopsis</label>
                    <textarea class="form-control" name="synopsis" id="synopsis" cols="30" rows="3"></textarea>
                </div>
            </div>
            
            <div class="row d-flex justify-content-evenly">
                <div>
                    <label class="form-label">Realisateur</label>
                    <select class="form-select form-select-lg mb-3 col-4" name="id_realisateur" id="id_realisateur">
                        <?php foreach($realisateurs->fetchAll() as $realisateur){ 
                            echo "<option value='" . $realisateur['id_realisateur'] . "'>" . $realisateur['prenom'] . " " . $realisateur['nom'] . "</option>";
                        } ?>
                    </select>
                </div>
                <div>
                    <label class="form-label" >Genre</label>
                    <select class="form-select form-select-lg mb-3 col-4" name="id_genre" id="id_genre">
                        <?php foreach($genres->fetchAll() as $genre){ 
                            echo "<option value='" . $genre['id_genre'] . "'>" . $genre['nom_genre'] ."</option>";
                        } ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-evenly">
                <button class="btn btn-primary mb-5 " name="submit" type="submit">Ajouter</button>
            </div> 
       </form>
    </div>
</div>


<?php

$title="Ajout Film"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";