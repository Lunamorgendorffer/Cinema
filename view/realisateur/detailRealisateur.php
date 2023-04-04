<?php

ob_start();

?>
<h1>Detail realisateur</h1>
<?php
$realisateur= $realisateurs->fetch();
    echo $realisateur['prenom']."  ";
    echo $realisateur['nom']." ";
    echo $realisateur['age']." ans <br> ";
?>

<?php

$title="Détail realisateur"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";