<?php

ob_start();

?>
<h1>Bienvenue sur ma page film</h1>
<?php
while ($film= $films->fetch()){
    echo $film['id_film']."  ";
    echo $film['titre']."<br>";
}
?>

<?php

$title="liste des films"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";