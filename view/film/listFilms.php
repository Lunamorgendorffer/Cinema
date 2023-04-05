<?php

ob_start();

?>
<h1>Bienvenue sur ma page film</h1>
<?php
while ($film= $films->fetch()){?>
    <a href="index.php?action=detailFilm&id=<?=$film['id_film']?>"><?=$film['titre']?></a><br>
<?php
    // echo $film['titre']."<br>";
}
?>

<a href="index.php?action=ajouter">AJOUTER</a>

<?php

$title="liste des films"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";