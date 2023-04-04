<?php

ob_start();

?>
<h1>Les categories de film </h1>

<?php
while ($genre= $genres->fetch()){?>
    <a href="index.php?action=detailGenre&id=<?=$genre['id_genre']?>"><?=$genre['nom_genre']?></a><br>
<?php
    // echo $film['titre']."<br>";
}
?>


<?php

$title="liste des genres"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";