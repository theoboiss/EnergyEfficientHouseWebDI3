<?php
/**
* Vue : ajouter une ville
*/
?>

<?php echo AfficheAlerte($alerte); ?>

<form method="POST" action="">
	
    <label for="id_libelle">Nom de la nouvelle ville :</label>
    <input type="text" id="id_libelle"  name="libelle" 
           placeholder="Entrez le nom" required=""/>
    <br/>
    <label for="id_libelle">Code postal :</label>
    <input type="text" id="code_postal"  name="code_postal" 
           placeholder="Entrez le code postal" required=""/>
    <br/>
    <label for="id_Departement">Département :</label>
    <select id="id_dept" name="id_departement" required="">
        <option value="default">Choisissez</option>
        <?php  
            foreach ($liste as $element) { 
                echo '<option value="'.$element['Id_Departement'].'">'.$element['nomDepartement'].'</option>';
            }
        ?>
    </select>
    <br/>
    <button type="submit" id="id_ajout" name="submit">Ajouter</button>

</form>

<p><a href="index.php?cible=ville">Retour</a> | <a href="index.php">Accueil</a></p>