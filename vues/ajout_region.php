<?php
/**
* Vue : ajouter une région
*/
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>
<?php echo AfficheAlerte($alerte); ?>

<fieldset class="region_form">
<form method="POST" action="">
	
    <label for="id_libelle">Libellé :</label>
    <input type="text" id="id_libelle"  name="libelle" 
           placeholder="Entrez le libellé" required=""/>

    <button type="submit" id="id_ajout" name="submit">Ajouter</button>

</form>
</fieldset>

<p><a href="index.php?cible=region">Retour</a> | <a href="index.php">Accueil</a></p>