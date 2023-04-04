<?php

ob_start();

?>
<h1>Bienvenue sur la page liste de realisateurs</h1>
<?php
while ($realisateur= $realisateurs->fetch()){?>
    <a href="index.php?action=detailRealisateur&id=<?=$realisateur['id_realisateur']?>"><?=$realisateur['prenom']." ".$realisateur['nom']?></a><br>
<?php
    // echo $film['titre']."<br>";
}
?>
<?php
// while ($realisateur= $realisateurs->fetch()){
//     echo $realisateur['prenom']."  ";
//     echo $realisateur['nom']." ";
//     echo $realisateur['age']."  ans.<br>";
// }
?>

<?php

$title="liste des realisateurs"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";