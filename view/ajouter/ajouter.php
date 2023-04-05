<?php

ob_start();

?>

<h3>Ajouter film </h3>
<form action="index.php?action=ajouterFilm" method="post">

    <p>
        <label>titre</label>
        <input type="text" name="titre" id="titre">
    </p>
    </tr>
    
    <p>
        <label for="duree">duree:</label>
       <td> <input type="int" step="any" name="duree" >
    </p>
    
    <p>
        <label>date de sortie:</label>
        <input type="date" name="dateDeSortie" id="dateDeSortie">
    </p>
   
    <p>
        <label>note:</label>
        <td><input type="number" name="note" id="note" >
    </p>
    
    <p>
        <label>synopsis</label>
        <textarea name="synopsis" id="synopsis" cols="30" rows="3"></textarea>
    </p>
    <p>
        <label for="id_film">realisateur</label>
        <select name="id_realisateur" id="id_realisateur">
            <?php foreach($realisateurs->fetchAll() as $realisateur){ ?>
                <option value="<?=$film['id_realisateur']?>"><?=$realisateur['prenom']. " " .$realisateur['nom']?></option>
                <?php } ?>
        </select>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter">
    </p>
    
</form>

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

<h3>Ajouter un acteur </h3>
<form action="index.php?action=ajouterActeur" method="post">

    <p>
        <label>NOM</label>
        <input type="text" name="nom" id="nom" required>
    </p>
    </tr>
    
    <p>
        <label>prenom</label>
       <input type="text" name="prenom" id="prenom" required>
    </p>

    <p>
        <label>age</label>
        <input type="int" name="age" id="nom" required>
    </p>
    </tr>
    
    <p>
        <label>nationalité</label>
       <input type="text" name="nationalite" id="prenom"required>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter">
    </p>
    
</form>

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