<?php

ob_start();

?>
<h1>Detail film</h1>
<?php $film= $film->fetch(); ?>
<div class="card-body">
    <h2 class="card-title text-center"><?=$film['titre'];?></h2>
    <p class="card-text text-center">Réalisé(e) par <?=$film['reali'];?></p>
    <p class="card-text text-center">Durée: <?=$film['duree'];?> min</p>
    <p class="card-text text-center"><small class="text-muted">Sortie le : <?=$film['dateDeSortie'];?></small></p>
    <p class="card-text text-center"><?=$film['note'];?> sur 5</p>
    <p class="card-text text-center"><strong>Synopsis : </strong> </p>
    <p class="card-text"><?=$film['synopsis'];?></p>
</div>

<div class="col-4">
    <div class="card mt-5" >
            <h2 class="card-title text-center">Casting</h2>
            <ul class="list-group list-group-flush">
                <?php foreach ( $casting->fetchAll() as $casting){ ?>
                    <li class="list-group-item">
                        <a href="index.php?action=detailActeur&id=<?= $casting['id_acteur']?>"><?= $casting['acteur'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
</div>

<a href="#"><button>Ajouter casting</button></a>

<?php

$title="liste détail de film"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";