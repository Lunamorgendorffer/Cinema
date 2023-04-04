<?php

ob_start();

?>
<h1>Les categories de film </h1>
<?php
while ($genre= $genres->fetch()){
    echo $genre['id_genre']."  ";
    echo $genre['nom_genre']."<br>";
    
}
?>

<?php

$title="liste des genres"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";