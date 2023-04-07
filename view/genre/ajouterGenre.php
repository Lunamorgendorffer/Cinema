
<?php

ob_start();

?>

<h3>Ajouter genre </h3>
<form action="index.php?action=ajouterGenre" method="post">

    <p>
        <label>Nom du Genre</label>
        <input type="text" name="nom_genre" id="libelle">
    </p>
    </tr>

    <p>
        <input type="submit" name="submit" value="Ajouter">
    </p>
</form>    

<?php

$title="Ajout"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";
//lastinserid dans la requete
