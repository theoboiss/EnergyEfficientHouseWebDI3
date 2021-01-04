<?php
/**
* Vue : ajouter un département
*/
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>

<?php echo AfficheAlerte($alerte); ?>

<fieldset class="departement_form">
<form method="POST" action="">
	
    <label for="id_libelle">Libellé :</label>
    <input type="text" id="id_libelle"  name="libelle" 
           placeholder="Entrez le libellé" required=""/>
    
    <label for="id_region">Région :</label>
    <select id="id_idRegion" name="idRegion" required="">
        <option value="default">Choisissez</option>
        <?php  
            foreach ($liste as $element) { 
                echo '<option value="'.$element['Id_Region'].'">'.$element['nomRegion'].'</option>';
            }
        ?>
    </select>

    <button type="submit" id="id_ajout" name="submit">Ajouter</button>

</form>
</fieldset>

<p><a href="index.php?cible=departement">Retour</a> | <a href="index.php">Accueil</a></p>