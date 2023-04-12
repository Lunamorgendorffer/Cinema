<?php

ob_start();

?>
<div class="container">
    <?php $film= $film->fetch(); ?>
    <div class="card-body text-center text-white " >
        <h2 class="card-title "><?=$film['titre'];?></h2>
        <p class="card-text">Réalisé(e) par <?=$film['reali'];?></p>
        <p class="card-text">Durée: <?=$film['duree'];?> min</p>
        <p class="card-text"><small>Sortie le : <?=$film['dateDeSortie'];?></small></p>
        <p class="card-text"><?=$film['note'];?> sur 5</p>
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 80%;">
                <h5 class="card-title" style="text-align: center;">Synopsis :</h5>
                <p class="text-dark mx-auto" ><b><?=$film['synopsis'];?></b></p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" >
        <div class="card mt-3 " style="width: 78%;" >
            <h2 class="card-title text-center">Casting</h2>
            <ul class="list-group list-group-flush">
                <?php foreach ( $casting->fetchAll() as $casting){ ?>
                    <li class="list-group-item text-center">
                        <a href="index.php?action=detailActeur&id=<?= $casting['id_acteur']?>"><?= $casting['acteur'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class=" mt-2 d-flex justify-content-center">
        <a href="index.php?action=viewAjouterCasting&id=<?= $casting['id_film']?>"><button>Ajouter casting</button></a> 
    </div>
</div>





<?php

$title="Détail du film"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";