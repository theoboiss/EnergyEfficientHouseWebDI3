<?php
/**
* Vue : ajouter une ville
*/
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>
<?php echo AfficheAlerte($alerte); ?>

<fieldset class="ville_form">
<form method="POST" action="" >
	
    <label for="id_libelle">Nom de la nouvelle ville :</label>
    <input type="text" id="id_libelle"  name="libelle" value=<?php foreach($liste as $ville){ echo "\"$ville[nom_ville]\"";} ?>
           placeholder="Entrez le nom" required=""/>
    <br/>
    <label for="id_libelle">Code postal :</label>
    <input type="text" id="code_postal"  name="code_postal" value=<?php foreach($liste as $ville){ echo "\"$ville[code_postal]\"";} ?>
           placeholder="Entrez le code postal" required=""/>
    <br/>
    <label for="id_Departement">Département :</label>
    <select id="id_dept" name="id_departement" required="">
    <option value=<?php foreach($liste as $dept){ echo "\"$dept[Id_Departement]\"";}?>><?php foreach($liste as $dept){ echo "$dept[nomDepartement]";}?></option>
        <?php  
            foreach ($listeDept as $element) { 
                echo '<option value="'.$element['Id_Departement'].'">'.$element['nomDepartement'].'</option>';
            }
        ?>
    </select>
    <br/>
    <button type="submit" id="id_ajout" name="submit"><?php echo $function; ?></button>

</form>
</fieldset>


<p><a href="index.php?cible=ville">Retour</a></p>