<?php

ob_start();

?>
<h1>Bienvenue sur ma page d'acceuil</h1>

<?php

$title="Acceuil"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";