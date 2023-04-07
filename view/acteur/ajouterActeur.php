<?php

ob_start();

?>

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

<?php

$title="Ajout"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";