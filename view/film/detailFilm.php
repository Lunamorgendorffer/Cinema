<?php

ob_start();

?>
<h1>Detail film</h1>
<?php
$film= $film->fetch();

// $realisateur= $realisateur->fetch();
    echo $film['titre']."  ";
    echo "de " .$film['reali'];
    echo $film['dateDeSortie']." - ";
    echo $film['duree']." min <br>";
    echo $film['synopsis']."<br>";
?>

<a href="index.php?action=pageAjouter"><button>Ajouter casting</button></a>

<?php

$title="liste détail de film"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";