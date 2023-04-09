<?php

ob_start();

?>

<div class="container">
    <h1 class="mb-5">Films par Catégories</h1>
        <div class="row row-cols-md-4 g-4 mt-5 d-flex justify-content-evenly">
            <?php foreach ($genres->fetchAll() as $genre){ ?>
                <div class="card m-2 bg-dark">
                    <div class="card-body text-center bg-dark">
                        <h5>
                            <a href="index.php?action=detailGenre&id=<?= $genre['id_genre']?>"><?= $genre['nom_genre'] ?></a>
                        </h5>
                    </div>
                    <hr class="bg-light">
                    <div class="d-flex justify-content-center">
                        <a href="index.php?action=deleteGenre&id=<?=$genre['id_genre']?>"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="row">
        <div class="d-flex justify-content-evenly">
        <a href="index.php?action=ajouterGenre" class="btn btn-primary">Ajouter un acteur</a>
    </div>    
         
</div>



<?php

$title="liste des genres"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";