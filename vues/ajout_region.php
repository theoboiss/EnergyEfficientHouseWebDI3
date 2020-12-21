<?php
/**
* Vue : ajouter une région
*/
?>

<?php echo AfficheAlerte($alerte); ?>

<form method="POST" action="">
	
    <label for="id_libelle">Libellé :</label>
    <input type="text" id="id_libelle"  name="libelle" 
           placeholder="Entrez le libellé" required=""/>

    <button type="submit" id="id_ajout" name="submit">Ajouter</button>

</form>

<p><a href="index.php?cible=region">Retour</a> | <a href="index.php">Accueil</a></p>