<?php

ob_start();
?>

<h3 class="mb-5 mt-5" >Ajouter un casting</h3>

<div class="container mb-5">
    <div class="row g-0">
        <form action="index.php?action=ajouterCasting" method="post">

            <div class="row d-flex justify-content-evenly">
                <input type="hidden" name="id_film" value="<?=$_GET['id']?>">  <!--  on recupere l'id du film de la ! attention le champs est consultable coté client  -->
                <select name="id_role" class="form-select form-select-lg mb-5 text-center col-7 ">
                    <option selected>Choisissez le role</option>
                    <?php foreach($roles as $role){ ?>
                    <option value="<?= $role['id_role']?>"><?=$role['nom']?></option>
                    <?php } ?>
                </select>
                <select name="id_acteur" class="form-select form-select-lg mb-5 text-center col-7 ">
                    <option selected>Choisissez l'acteur correspondant</option>
                    <?php foreach($acteurs as $acteur){ ?>
                    <option value="<?= $acteur['id_acteur']?>"><?=$acteur['nom']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex justify-content-evenly">
                <button class="btn btn-primary mb-5 " name="submit" type="submit">Ajouter</button>
            </div> 
       </form>
    </div>
</div>


<?php

$title="Ajout"; 
$contenu = ob_get_clean(); // temporisation de sortie

require "view/layout.php";