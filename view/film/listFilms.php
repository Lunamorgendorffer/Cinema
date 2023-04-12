<?php

ob_start();

?>

<div class="container">
  <h1  class="display-1" style="text-align:center">Liste des films</h1>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-evenly">
    <?php foreach ($films->fetchAll() as $film){?>
      <div class="col ">
        <div class="card  border border-0 "  width="184" height="262">
          <img src="<?= $film['affiche'];?>" class="rounded mx-auto d-block mt-3" alt="affiche du film">
          <div class="card-body">
            <p class="card-text text-center"><a href="index.php?action=detailFilm&id=<?= $film['id_film'] ?>"><?= $film['titre'] ?></a></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group mx-auto ">
                <a href="index.php?action=SupprimerFilm&id=<?=$film['id_film'] ?>"><button type="button" class="btn btn-secondary">Supprimer</button></a>
              </div> 
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <a href="index.php?action=viewAjouterFilm" class="btn btn-primary " >Ajouter film</a>
</div>



<?php

$title="Films"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";