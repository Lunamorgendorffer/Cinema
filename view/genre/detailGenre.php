<?php

ob_start();

?>
<h1>Detail genre</h1>
<?php
$genre= $genres->fetch();
    echo $genre['id_genre']."  ";
    echo $genre['nom_genre']."<br>";
    
?>

<?php

$title="Détail genre"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";