<?php 
/**
* Vue : liste des régions déjà enregistrés
*/
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>
<p><?php echo $entete; ?></p>


<table class="region_table">
	<thead>
		<tr>

			<th>Identifiant</th>
			<th>Libellé</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($liste as $element) { ?>
    
        <tr> 
            <td class="region_td">
        	<?php echo $element['nomRegion']; ?>
            </td>
            <?php
            echo '<td><a href="index.php?cible=region&fonction=modifier&id='.$element['Id_Region'].'">Modifier</a></td>';
            echo '<td><a href="index.php?cible=region&fonction=supprimer&id='.$element["Id_Region"].'">Supprimer</a></td>';
            ?>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>


<p><a href="index.php?cible=region&fonction=ajout">Ajouter une région</a> | <a href="index.php?cible=region&fonction=recherche">Chercher une région</a> | <a href="index.php">Accueil</a></p>
