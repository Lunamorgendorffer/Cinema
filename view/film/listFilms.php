<?php

ob_start();

?>



<div class="container" style="display: flex;flex-wrap: wrap;">
  <?php while($film = $films->fetch()){?>
    <div class="card" style="width: 20%; margin: 25px;">
      <img src="<?=$film['affiche']?>" class="card-img-top">
      <div class="card-body">
        <p class="card-text text-center">
          <a href="index.php?action=detailFilm&id=<?= $film['id_film'] ?>"><?= $film['titre'] ?></a><br>
        </p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group mx-auto ">
            <a href="index.php?action=SupprimerFilm&id=<?=$film['id_film'] ?>"><button type="button" class="btn btn-outline-secondary">Supprimer</button></a>
          </div> 
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<div class=" mb-4 d-flex justify-content-center">
  <a href="index.php?action=viewAjouterFilm" class="btn btn-primary " >Ajouter un film</a>
</div>


<?php

$title="Films"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";