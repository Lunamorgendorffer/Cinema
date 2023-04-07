<?php

ob_start();

?>
<h1>Bienvenue sur ma page film</h1>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php while ($film= $films->fetch()){?>
        <a href="index.php?action=detailFilm&id=<?=$film['id_film']?>"><?=$film['titre']?></a><br>
        <?php } ?>
    </h5>
    <a href="index.php?action=pageAjouter" class="btn btn-primary">Ajouter film</a>
  </div>
</div>

<?php
// while ($film= $films->fetch()){?>
<!--      <a href="index.php?action=detailFilm&id=<?=$film['id_film']?>"><?=$film['titre']?></a><br> -->
<?php
    // echo $film['titre']."<br>";
// }
?>

<!-- <a href="index.php?action=pageAjouter"><button>Ajouter film</button></a> -->
<?php

$title="liste des films"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";