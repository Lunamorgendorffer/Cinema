<?php

ob_start();

?>
<h1>Bienvenue sur ma page film</h1>

<div class="row row-cols-md-5 g-4 mt-5 d-flex justify-content-evenly">
  <?php foreach ($films->fetchAll() as $film){?>
    <div class="card m-2 mt-4 mb-4 bg-dark">
      <div class="card-text">
        <h5 class="card-title text-center">
          <a href="index.php?action=detailFilm&id=<?= $film['id_film'] ?>"><?= $film['titre'] ?></a>
        </h5>
      </div>
      <hr class="bg-light">
      <div class="d-flex justify-content-center">
      <a href="index.php?action=deleteFilm&id=<?=$film['id_film'] ?>"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>
      </div>
    </div>
  <?php } ?>
  <a href="index.php?action=viewAjouterFilm" class="btn btn-primary">Ajouter film</a>
</div>


<?php

$title="liste des films"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";