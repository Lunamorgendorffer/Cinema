<?php

ob_start();

?>
<h1>Bienvenue sur ma page acteur</h1>
<?php
while ($acteur= $acteurs->fetch()){
    echo $acteur['prenom']."    ";
    echo $acteur['nom']." ";
    echo $acteur['age']." ans <br>";
}
?>

<?php

$title="liste des acteurs"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";