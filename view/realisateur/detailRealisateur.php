<?php

ob_start();

?>


<h1>Detail Acteur</h1>

<?php $realisateur= $realisateurs->fetch(); ?>

<div class="container-flui d-flex justify-content-center mt-5">
    <div class="row row-cols-md-5 g-4 mt-5 d-flex justify-content-evenly">
        <div class="card mb-3 " style="max-width: 540px;">
            <div class="col">
                <div class="row g-0 ">
                <!-- <img src="<?=$realisateur['image_realisateur'];?>" class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <p class="card-text"><strong>age </strong><?=$realisateur['age'];?></p>
                        <p class="card-text"><strong>Sexe : </strong><?=$realisateur['sexe'];?></p>
                        <p class="card-text"><strong>Nationalité :</strong> <?=$realisateur['nationalite'];?></p>
                    </div>
                    <hr>
                    <div class="card-body">
                        <p class="card-text">Biographie : <?="</br>".$realisateur['biographie'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <h2 class="card-title text-center">Filmographie</h2>
                <ul class="list-group list-group-flush">
                    <?php foreach ($castings->fetchAll() as $casting){?>
                        <li class="list-group-item"><a href="index.php?action=detailFilm&id=<?= $casting['Id_film'] ?>"><?= $casting['titre'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php

$title="Détail realisateur"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";