<?php

ob_start();

?>
<h1>Detail Acteur</h1>
<?php
$acteur= $acteurs->fetch();
    echo $acteur['prenom']."  ";
    echo $acteur['nom']." ";
    echo $acteur['age']." ans <br> ";
?>

<?php

$title="Détail Acteur"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";