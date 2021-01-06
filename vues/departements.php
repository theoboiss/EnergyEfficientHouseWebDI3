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


<table class="object_table">
	<thead>
		<tr>

			<th class="object_td">Nom</th>
			<th class="object_td">Région</th>
		</tr>
	</thead>
	<tbody>	
	
    <?php foreach ($liste as $element) { ?>
    
        <tr> 
            <td class="object_td">
        	<?php echo $element['nomDepartement']; ?>
            </td>
            <td class="object_td">
        	<?php echo $element['nomRegion']; ?>
            </td>
            <?php
            echo '<td class="object_td"><a href="index.php?cible=departement&fonction=modifier&id='.$element['Id_Departement'].'">Modifier</a></td>';
            echo '<td class="object_td"><a href="index.php?cible=departement&fonction=supprimer&id='.$element["Id_Departement"].'">Supprimer</a></td>';
            ?>
        </tr>
    
    <?php } ?>

	</tbody>
</table>


<?php echo AfficheAlerte($alerte); ?>


<p><a href="index.php?cible=departement&fonction=ajout">Ajouter un département</a> | <a href="index.php?cible=departement&fonction=recherche">Chercher un département</a> | <a href="index.php">Accueil</a></p>
