<?php

ob_start();

?>

<h3>Ajouter un realisateur </h3>
<form action="index.php?action=ajouterReal" method="post">

    <p>
        <label>NOM</label>
        <input type="text" name="nom" id="nom">
    </p>
    </tr>
    
    <p>
        <label>prenom</label>
       <input type="text" name="prenom" id="prenom">
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter">
    </p>
    
</form>

<?php

$title="Ajout"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";