<?php 
/**
* Vue : liste des départements déjà enregistrés
*/
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="public/css/styles_con.css"/>
        </head>
<p><?php echo $entete; ?></p>


<table class="departement_table">
	<thead>
		<tr>

			<th>Nom</th>
			<th>Région</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($liste as $element) { ?>
    
        <tr> 
            <td class="departement_td">
        	<?php echo $element['nomDepartement']; ?>
            </td>
            <td class="departement_td">
        	<?php echo $element['nomRegion']; ?>
            </td>
            <?php
            echo '<td class="departement_td"><a href="index.php?cible=region&fonction=modifier&id='.$element['Id_Departement'].'">Modifier</a></td>';
            echo '<td class="departement_td"><a href="index.php?cible=region&fonction=supprimer&id='.$element["Id_Departement"].'">Supprimer</a></td>';
            ?>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>


<p><a href="index.php?cible=departement&fonction=ajout">Ajouter un département</a> | <a href="index.php?cible=departement&fonction=recherche">Chercher un département</a> | <a href="index.php">Accueil</a></p>
