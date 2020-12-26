<?php
/**
* Vue : ajouter un appareil
*/
?>

<?php echo AfficheAlerte($alerte); ?>

<form method="POST" action="">
	
    <label for="id_libelle">Libellé :</label>
    <input type="text" id="id_libelle"  name="libelle" 
           placeholder="Entrez le libellé" required=""/>
    
    <label for="Id_Appartement">Appartement</label>
    <select id="Id_Appartement" name="Id_Appartement" required="">
        <option value="default">Choisissez</option>
        <?php  
            foreach ($ajoutAppareil as $element) { 
                echo '<option value="'.$element['Id_Appartement'].'">'.$element['libelleAppartement'].'</option>';
            }
        ?>
    </select>

    <button type="submit" id="id_ajout" name="submit">Ajouter</button>

</form>

<p><a href="index.php">Accueil</a></p>
