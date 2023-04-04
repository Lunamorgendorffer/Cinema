<?php

ob_start();

?>
<h1>Detail film</h1>
<?php
while ($film= $films->fetch()){
    echo $film['titre']."  ";
    echo "de " .$film['id_realisateur']." - ";
    echo $film['dateDeSortie']." - ";
    echo $film['duree']." min <br>";
    echo $film['synopsis']."<br>";
}
?>

<?php

$title="liste détail de film"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";