<?php

ob_start();

?>
<div class="container-fluid">
    <h1>Bienvenue sur ma page acteur</h1>

    <div class="row row-cols-1 row-cols-md-6 g-4 mt-5 d-flex justify-content-evenly">
        <?php foreach ($acteurs->fetchAll() as $acteur){ ?>
            <div class="card m-2 mt-4 mb-4 bg-dark">
                <div class="card-text">
                    <h5 class="card-title text-center"><a href="index.php?action=detailActeur&id=<?=$acteur['id_acteur']?>"><?=$acteur['prenom']." ".$acteur['nom']?></a></h5><br>
                </div>
                <hr class="bg-light">
                <div class="dropdown d-flex justify-content-evenly">
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <button type="button" class="btn btn-lg"><a href="index.php?action=deleteActeur&id=<?=$acteur['id_acteur']?>">Supprimer</a></button>
                    </ul>
                </div>
            </div>
        <?php }?>
    </div>
    <div class="row">
        <div class="d-flex justify-content-evenly">
        <button type="button" class="btn btn-lg  mt-2 "><a href="index.php?action=viewAdd" class="btn btn-primary">Ajouter un acteur</a></button>
        </div>
    </div>
</div>


    



<?php

$title="liste des acteurs"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";