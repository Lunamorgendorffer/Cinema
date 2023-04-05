<?php

ob_start();

?>
<h1>Detail film</h1>
<?php
$film= $films->fetch();

$realisateur= $realisateurs->fetch();
    echo $film['titre']."  ";
    echo "de " .$realisateur['prenom']."  ".$realisateur['nom']." ";
    echo $film['dateDeSortie']." - ";
    echo $film['duree']." min <br>";
    echo $film['synopsis']."<br>";
?>

<?php

$title="liste détail de film"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";