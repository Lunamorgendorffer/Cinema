<?php

ob_start();

?>
<h1>Detail Acteur</h1>
<?php $acteur= $acteurs->fetch(); ?>

<div class="container-fluid d-flex flex-column mt-5">
    <div class="row row-cols-md-5 g-4 mt-5 d-flex justify-content-evenly">
        <div class="card mb-3 " style="max-width: 540px;">
            <div class="col">
                <div class="row g-0 ">
                    <div class="card-body">
                        <p class="card-text"><strong>age </strong><?=$acteur['age'];?></p>
                        <p class="card-text"><strong>Sexe : </strong><?=$acteur['sexe'];?></p>
                        <p class="card-text"><strong>Nationalité :</strong> <?=$acteur['nationalite'];?></p>
                    </div>
                    <hr>
                    <div class="card-body">
                        <p class="card-text"><strong>Biographie : </strong> <?="</br>".$acteur['biographie'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <h2 class="card-title text-center">Filmographie</h2>
                <ul class="list-group list-group-flush">
                    <?php foreach ($casting->fetchAll() as $casting){ ?>
                        <li class="list-group text-center"><a href="index.php?action=detailFilm&id=<?= $casting['Id_film'] ?>"><?= $casting['titre'] ?></a></li>
                        <li class="list-group-item text-center">Joue le rôle de <?= $casting['nom_personnage'] ?></li>  
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php

$title="Détail Acteur"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";