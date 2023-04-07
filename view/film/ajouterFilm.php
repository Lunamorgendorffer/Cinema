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
        <label >realisateur</label>
        <select name="id_realisateur" id="id_realisateur">
            <?php foreach($realisateurs->fetchAll() as $realisateur){ 
                echo "<option value='" . $realisateur['id_realisateur'] . "'>" . $realisateur['prenom'] . " " . $realisateur['nom'] . "</option>";
                    } ?>
        </select>
    </p>
    <p>
        <label >GENRE</label>
        <select name="id_genre" id="id_genre">
            <?php foreach($genres->fetchAll() as $genre){ 
                echo "<option value='" . $genre['id_genre'] . "'>" . $genre['nom_genre'] ."</option>";
                    } ?>
        </select>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter">
    </p>
    
</form>



<?php

$title="Ajout Film"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";