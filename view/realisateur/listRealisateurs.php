<?php

ob_start();

?>

<div class="container-fluid">
    <h1>Bienvenue sur ma page realisateur</h1>

    <div class="row row-cols-1 row-cols-md-6 g-4 mt-5 d-flex justify-content-evenly">
        <?php foreach ($realisateurs->fetchAll() as $realisateur){ ?>
            <div class="card m-2 mt-4 mb-4 bg-dark">
                <div class="card-text">
                    <h5 class="card-title text-center"><a href="index.php?action=detailRealisateur&id=<?=$realisateur['id_realisateur']?>"><?=$realisateur['prenom']." ".$realisateur['nom']?></a></h5><br>
                </div>
                <hr class="bg-light">
                <div class="d-flex justify-content-center">
                    <a href="index.php?action=detailRealisateur&id=<?=$realisateur['id_realisateur']?>"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>
                </div>
            </div>
        <?php }?>
    </div>
    <div class="row">
        <div class="d-flex justify-content-evenly">
        <a href="index.php?action=pageAjouterReal" class="btn btn-primary">Ajouter un realisateur</a>
    </div>
</div>


<?php

$title="liste des realisateurs"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";