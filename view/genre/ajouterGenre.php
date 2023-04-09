
<?php

ob_start();

?>

<h1 class="mb-5 mt-5" >Ajouter genre</h1>

<div class="container mb-5">
    <div class="row g-0">
        <form action="index.php?action=ajouterGenre" method="post">
            <div class="row d-flex justify-content-evenly">
                <div class="mb-5 col-4">
                    <label for="formGroupExampleInput" class="form-label">Catégorie</label>
                    <input class="form-control" type="text" name="nom_genre"  required>
                </div>
            </div>
            <div class="d-flex justify-content-evenly">
                <button class="btn btn-primary mb-5 " name="submit" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<!-- <h3>Ajouter genre </h3>
<form action="index.php?action=ajouterGenre" method="post">

    <p>
        <label>Nom du Genre</label>
        <input type="text" name="nom_genre" id="libelle">
    </p>
    </tr>

    <p>
        <input type="submit" name="submit" value="Ajouter">
    </p>
</form>     -->

<?php

$title="Ajout"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";
//lastinserid dans la requete
